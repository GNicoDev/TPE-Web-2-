<?php
class viewVehiculos
{

    // Muestra el listado de los vehiculos. Esta funcion resive 3 parametros. Primer parametro Un arreglo 
    //con los vehiculos a mostrar. El 2do con una varible que lleva el modelo de los autos que se selecciono
    // en el select en el caso que asi sea, de lo contrario dera null si solo se quiere ver todo el listado 
    //de vehiculos. 3ro
    public function showVehiculos($vehiculos,$year,$user)
    {
        $usuario = $user;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/catalogo.phtml';
        require_once 'templates/layout/footer.phtml';
    }

    //Muestra el detalle del vehiculo seleccionado
    function showCarDetails($vehiculo, $books, $user)
    { {
        $usuario = $user;
        $reservas = $books;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/detallesVehiculos.phtml';
         require_once 'templates/layout/footer.phtml';
        }
    }

    function showFormAlta($user){
        $usuario = $user;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/form_alta_vehiculo.phtml';
    }

    function showFormUpdate($car,$user){
        $usuario=$user;
        $vehiculo=$car;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/form_update_vehiculo.phtml';
    }
}
