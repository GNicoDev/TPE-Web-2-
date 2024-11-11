<?php
include_once 'app/models/reserva.model.php';
include_once 'app/models/usurio.model.php';
include_once 'app/views/reserva.view.php';
include_once 'app/views/mensaje.view.php';


class ReservaController {
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
    // MUESTRA LA LISTA DE RESERVAS QUE SE ENCUENTRA EN LA TABLA RESERVAS
    function showReservas(){
        $reservas = $this->reservaModel->getReservas();
        $this->viewReserva->showReservas($reservas, $this->user);
    }

    function showDetalleReserva($id){
        $reserva = $this->reservaModel->getReservaById($id);
        $this->viewReserva->showDetalleReserva($reserva, $this->user);
    }

    function showReservasPorVehiculo(){
        $vehiculo = $this->vehiculoModel->getCarById($_GET['idVehiculo']);
        if(!$vehiculo)
            $this->viewMensaje->showMensaje('No existe un vehiculo con ese ID','error',$this->user);
        else{
            $reservas = $this->reservaModel->getReservasByCar($vehiculo->id);
            $this->viewReserva->showReservasPorVehiculo($vehiculo,$reservas,$this->user);
        }
    }
}