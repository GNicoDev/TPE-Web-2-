<?php
include_once 'app/Models/vehiculos.model.php';
include_once 'app/views/vehiculos.view.php';
include_once 'app/views/mensaje.view.php';

class VehiculoControllers{

    private $modelVehiculos;
    private $viewVehiculos;
    private $viewMensaje;
    private $user=null;


    function __construct($res){
        $this->modelVehiculos = new Vehiculos();
       $this->viewVehiculos = new viewVehiculos();
       $this->viewMensaje = new Mensaje();
       $this->user = $res->user;
    }
    
    // MUESTRA LA LISTA DE VEHICULOS QUE SE ENCUENTRA EN LA TABLA VEHICULOS
    function showCatalogo(){
       // $vehiculos = $this->modelVehiculos->getAllCars();
       //echo "show ";
       $vehiculos = $this->modelVehiculos->getAllCars();
       $this->viewVehiculos->showVehiculos($vehiculos,$this->user);
    }

    //MUESTRA EL DETALLE DEL VEHICULO REQUERIDO SEGUN ID
    function showDetalles($id){
        //echo "$id"; 
        $vehiculo = $this->modelVehiculos->getCarById($id);
        if($vehiculo)
            return $this->viewVehiculos->showCarDetails($vehiculo,$this->user);
        return $this->viewMensaje->showMensaje("No existe un vehiculo con id = $id", "error",$this->user);

    }

    function showVehiculosByModelo(){
        if (!isset($_GET['select-modelos']))
            $this->viewMensaje->showMensaje('No hay modelos seleccionados!', "error",$this->user);
        else  {
            $year = $_GET['select-modelos'];
            $vehiculos = $this->modelVehiculos->getCarsByYear($year);
            if($vehiculos)
                $this->viewVehiculos->showVehiculos($vehiculos,$this->user);
            else{
                $this->viewMensaje->showMensaje('Modelo de auto inexistente!', "error",$this->user);
                //header('Location:'.BASE_URL.'catalogo');
            }

        }

    }

}