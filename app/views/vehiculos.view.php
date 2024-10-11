<?php
class viewVehiculos
{

    // Muestra el listado de los vehiculos
    public function showVehiculos($vehiculos)
    {
        require_once 'templates/layout/header.phtml';
        require 'templates/catalogo.phtml';
        require_once 'templates/layout/footer.phtml';
    }

    //Muestra el detalle del vehiculo seleccionado
    function showCarDetails($vehiculo)
    { {
            require_once 'templates/layout/header.phtml';
            require 'templates/detallesVehiculos.phtml';
            require_once 'templates/layout/footer.phtml';
        }
    }


    public function showError($error)
    {
        require 'templates/error.phtml';
    }
}
