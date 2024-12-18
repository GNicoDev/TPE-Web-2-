<?php
include_once 'app/models/vehiculos.model.php';
include_once 'app/models/reserva.model.php';
include_once 'app/views/vehiculos.view.php';
include_once 'app/views/mensaje.view.php';

class VehiculoControllers
{

    private $modelVehiculos;
    private $modelReservas;
    private $viewVehiculos;
    private $viewMensaje;
    private $user = null;


    function __construct($res)
    {
        $this->modelVehiculos = new Vehiculos();
        $this->modelReservas = new Reserva();
        $this->viewVehiculos = new viewVehiculos();
        $this->viewMensaje = new Mensaje();
        $this->user = $res->user;
    }

    // MUESTRA LA LISTA DE VEHICULOS QUE SE ENCUENTRA EN LA TABLA VEHICULOS
    function showCatalogo()
    {
        // $vehiculos = $this->modelVehiculos->getAllCars();
        //echo "show ";
        $vehiculos = $this->modelVehiculos->getAllCars();
        $this->viewVehiculos->showVehiculos($vehiculos, null, $this->user);
    }

    //MUESTRA EL DETALLE DEL VEHICULO REQUERIDO SEGUN ID
    function showDetalles($id)
    {
        //echo "$id"; 
        $vehiculo = $this->modelVehiculos->getCarById($id);
        $reservas = $this->modelReservas->getReservasByCar($id);
        if ($vehiculo)
            return $this->viewVehiculos->showCarDetails($vehiculo, $reservas, $this->user);
        return $this->viewMensaje->showMensaje("No existe un vehiculo con id = $id", "error", $this->user);
    }

    function showVehiculosByModelo()
    {
        if (!isset($_POST['select-modelos']))
            $this->viewMensaje->showMensaje('No hay modelos seleccionados!', "error", $this->user);
        else {
            $year = $_POST['select-modelos'];
            $vehiculos = $this->modelVehiculos->getCarsByYear($year);
            if ($vehiculos)
                $this->viewVehiculos->showVehiculos($vehiculos, $year, $this->user);
            else {
                $this->viewMensaje->showMensaje('Modelo de auto inexistente!', "error", $this->user);
                //header('Location:'.BASE_URL.'catalogo');
            }
        }
    }

    function showFormAltaController()
    {
        $this->viewVehiculos->showFormAlta($this->user);
    }

    function nuevoVehiculo()
    {
        // var_dump($_POST);
        if (empty($_POST['marca']) || empty($_POST['modelo']) || empty($_POST['matricula']) || empty($_POST['precio']) || empty($_POST['imagen'])) {
            $this->viewMensaje->showMensaje("Faltaron completar campos", 'mensaje', $this->user);
        }
        else {
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $matricula = $_POST['matricula'];
            $precio = $_POST['precio'];
            $imagen = $_POST['imagen']; 
            $this->modelVehiculos->insertCar($marca, $modelo, $matricula, $precio, $imagen);
            header('Location: ' . BASE_URL . 'catalogo');
        }
    }

    function eliminarVehiculo($id)
    {
        $vehiculo = $this->modelVehiculos->getCarById($id);
        if ($vehiculo) {
            $this->modelVehiculos->deleteCarById($id);
            header('Location: ' . BASE_URL . 'catalogo');
        } else
            $this->viewMensaje->showMensaje("No existe Vehiculo con id = $id", 'error', $this->user);
    }

    function showFormActualizar($id)
    {
        $vehiculo = $this->modelVehiculos->getCarById($id);
        if ($vehiculo)
            $this->viewVehiculos->showFormUpdate($vehiculo, $this->user);
        else
            $this->viewMensaje->showMensaje("No existe vehiculo con id = $id", 'error', $this->user);
    }

    function actualizarVehiculo($id)
    {
        $vehiculo = $this->modelVehiculos->getCarById($id);
        if ($vehiculo) {
            if (empty($_POST['marca']) || empty($_POST['modelo']) || empty($_POST['matricula']) || empty($_POST['precio']) || empty($_POST['imagen'])) {
                $this->viewMensaje->showMensaje("Faltaron completar campos", 'mensaje', $this->user);
            }
            else {
                $marca = $_POST['marca'];
                $modelo = $_POST['modelo'];
                $matricula = $_POST['matricula'];
                $precio = $_POST['precio'];
                $imagen = $_POST['imagen'];            
                $vehiculo = $this->modelVehiculos->updateCar($id, $marca, $modelo, $matricula, $precio, $imagen);
                header('Location: ' . BASE_URL . "detalleVehiculo/$vehiculo->id");
            }
        } else
            $this->viewMensaje->showMensaje("No existe vehiculo con id = $id", 'error', $this->user);
    }
}
