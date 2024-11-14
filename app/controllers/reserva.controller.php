<?php
include_once 'app/models/reserva.model.php';
include_once 'app/models/usurio.model.php';
include_once 'app/views/reserva.view.php';
include_once 'app/views/mensaje.view.php';


class ReservaController
{
    private $reservaModel;
    private $vehiculoModel;
    private $viewReserva;
    private $viewMensaje;
    private $user;

    function __construct($res)
    {
        $this->reservaModel = new Reserva();
        $this->viewReserva = new viewReserva();
        $this->vehiculoModel = new Vehiculos();
        $this->viewMensaje = new Mensaje();
        $this->user = $res->user;
    }
    // MANEJA LA LISTA DE RESERVAS QUE SE ENCUENTRA EN LA TABLA RESERVAS
    function showReservas()
    {
        $reservas = $this->reservaModel->getReservas();
        $this->viewReserva->showReservas($reservas, $this->user);
    }

    //mANEJA EL DETALLE DE LA RESERVA SEGUN ID 
    function showDetalleReserva($id)
    {
        $reserva = $this->reservaModel->getReservaById($id);
        $this->viewReserva->showDetalleReserva($reserva, $this->user);
    }

    //MANEJA EL LISTADO
    function showReservasPorVehiculo()
    {
        $vehiculo = $this->vehiculoModel->getCarById($_GET['idVehiculo']);
        if (!$vehiculo)
            $this->viewMensaje->showMensaje('No existe un vehiculo con ese ID', 'error', $this->user);
        else {
            $reservas = $this->reservaModel->getReservasByCar($vehiculo->id);
            if ($reservas)
                $this->viewReserva->showReservasPorVehiculo($vehiculo, $reservas, $this->user);
            else
                $this->viewMensaje->showMensaje('El vehiculo con ese ID, no posee reservas', 'mensaje', $this->user);
        }
    }
    function showFormAltaController()
    {
        $vehiculos = $this->vehiculoModel->getAllCars();
        $this->viewReserva->showFormAltaReserva($vehiculos, $this->user);
    }

    function nuevaReserva()
    {
        if (empty($_POST['fecha']) || empty($_POST['cantDias']) || empty($_POST['select-reserva'])) {
            $this->viewMensaje->showMensaje("Faltaron completar campos", 'mensaje', $this->user);
        } else {
            $fecha = $_POST['fecha'];
            $cantDias = $_POST['cantDias'];
            $idVehiculo = $_POST['select-reserva'];
            $vehiculo = $this->vehiculoModel->getCarById($idVehiculo);
            if ($vehiculo) {
                $this->reservaModel->insertReserva($fecha, $cantDias, $idVehiculo);
            } else {
                $this->viewMensaje->showMensaje('No se ha encontrado un vehiculo con ese ID', 'error', $this->user);
            }
            header('Location: ' . BASE_URL . 'reservas');
        }
    }

    function showFormActualizar($id)
    {
        $reserva = $this->reservaModel->getReservaById($id);
        if ($reserva) {
            $vehiculos = $this->vehiculoModel->getAllCars();
            $this->viewReserva->showFormUpdateReserva($reserva, $vehiculos, $this->user);
        } else
            $this->viewMensaje->showMensaje("No existe vehiculo con id = $id", 'error', $this->user);
    }

    function actualizarReserva($id)
    {
        $reserva = $this->reservaModel->getReservaById($id);
        if ($reserva) {
            if (!empty($_POST['fecha']) && !empty($_POST['cantDias']) && !empty($_POST['select-reserva'])) {
                $fecha = $_POST['fecha'];
                $cantDias = $_POST['cantDias'];
                $idVehiculo = $_POST['select-reserva'];
                $this->reservaModel->updateReserva($reserva->id, $fecha, $cantDias, $idVehiculo);
                header('Location: ' . BASE_URL . "detallesReserva/$reserva->id");
            }
            else
                 $this->viewMensaje->showMensaje("Faltaron completar campos", 'mensaje', $this->user);
        } else
            $this->viewMensaje->showMensaje("No existe reserva con id = $id", 'error', $this->user);
    }

    function eliminarReserva($id)
    {
        $reserva = $this->reservaModel->getReservaById($id);
        if ($reserva) {
            $this->reservaModel->deleteReservaById($id);
            header('Location: ' . BASE_URL . 'reservas');
        } else
            $this->viewMensaje->showMensaje("No existe reserva con id = $id", 'error', $this->user);
    }
}
