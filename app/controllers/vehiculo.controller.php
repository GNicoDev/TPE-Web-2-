<?php
include_once 'app/Models/vehiculos.model.php';
include_once 'app/views/vehiculos.view.php';

class VehiculoControllers{

    private $modelVehiculos;
    private $viewVehiculos;

    function __construct(){
        $this->modelVehiculos = new Vehiculos();
       // $this->viewVehiculos        $this->view = new TaskView($res->user);
       $this->viewVehiculos = new viewVehiculos();
    }
    
    
    function showCatalogo(){
       // $vehiculos = $this->modelVehiculos->getAllCars();
       //echo "show ";
       $vehiculos = $this->modelVehiculos->getAllCars();
       $this->viewVehiculos->showVehiculos($vehiculos);
    }

    function showDetalles($id){
        //echo "$id"; 
        $vehiculo = $this->modelVehiculos->getCarById($id);
        $this->viewVehiculos->showCarDetails($vehiculo);
    }

}