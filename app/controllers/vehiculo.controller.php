<?php
include_once 'app/Models/vehiculos.model.php';
include_once 'app/views/vehiculos.view.php';
include_once 'app/views/error.view.php';

class VehiculoControllers{

    private $modelVehiculos;
    private $viewVehiculos;
    private $viewError;


    function __construct(){
        $this->modelVehiculos = new Vehiculos();
       $this->viewVehiculos = new viewVehiculos();
       $this->viewError = new Error();
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
        return $this->viewError->showError("No existe un vehiculo con id = $id");

    }

    function showVehiculosByModelo(){
        if (!isset($_GET['select-modelos']))
            echo 'Modelo de auto inexistente';
        else  {
            $year = $_GET['select-modelos'];
            $vehiculos = $this->modelVehiculos->getCarsByYear($year);
            $this->viewVehiculos->showVehiculos($vehiculos);
        }

    }

}