<?php
include_once 'app/Models/vehiculos.model.php';
include_once 'app/views/vehiculos.view.php';
include_once 'app/views/mensaje.view.php';

class VehiculoControllers{

    private $modelVehiculos;
    private $viewVehiculos;
    private $viewMensaje;


    function __construct(){
        $this->modelVehiculos = new Vehiculos();
       $this->viewVehiculos = new viewVehiculos();
       $this->viewMensaje = new Mensaje();
    }
    
    // MUESTRA LA LISTA DE VEHICULOS QUE SE ENCUENTRA EN LA TABLA VEHICULOS
    function showCatalogo(){
       // $vehiculos = $this->modelVehiculos->getAllCars();
       //echo "show ";
       $vehiculos = $this->modelVehiculos->getAllCars();
       $this->viewVehiculos->showVehiculos($vehiculos);
    }

    //MUESTRA EL DETALLE DEL VEHICULO REQUERIDO SEGUN ID
    function showDetalles($id){
        //echo "$id"; 
        $vehiculo = $this->modelVehiculos->getCarById($id);
        if($vehiculo)
            return $this->viewVehiculos->showCarDetails($vehiculo);
        return $this->viewMensaje->showMensaje("No existe un vehiculo con id = $id", "error");

    }

    function showVehiculosByModelo(){
        if (!isset($_GET['select-modelos']))
            $this->viewMensaje->showMensaje('No hay modelos seleccionados!', "error");
        else  {
            $year = $_GET['select-modelos'];
            $vehiculos = $this->modelVehiculos->getCarsByYear($year);
            if($vehiculos)
                $this->viewVehiculos->showVehiculos($vehiculos);
            else{
                $this->viewMensaje->showMensaje('Modelo de auto inexistente!', "error");
                //header('Location:'.BASE_URL.'catalogo');
            }

        }

    }

}