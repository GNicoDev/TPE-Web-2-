<?php
class viewVehiculos
{

    // Muestra el listado de los vehiculos
    public function showVehiculos($vehiculos,$user)
    {
        $usuario = $user;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/catalogo.phtml';
        require_once 'templates/layout/footer.phtml';
    }

    //Muestra el detalle del vehiculo seleccionado
    function showCarDetails($vehiculo, $user)
    { {
        $usuario = $user;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/detallesVehiculos.phtml';
         require_once 'templates/layout/footer.phtml';
        }
    }


    public function showError($error)
    {
        require 'templates/error.phtml';
    }
}
