<?php
class viewReserva
{

    //Muestra un listado con las reservas que se encuentran en la tabla reservas en la base de datos
    public function showReservas($reservas,$user)
    {
        $usuario = $user;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/reservas.phtml';
        require_once 'templates/layout/footer.phtml';
    }

    //Muestra el detalle del vehiculo seleccionado
    function showDetalleReserva($reserva, $user)
    { {
        $usuario = $user;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/detalleReserva.phtml';
         require_once 'templates/layout/footer.phtml';
        }
    }

    function showFormAltaReserva($cars, $user){
        $usuario = $user;
        $vehiculos = $cars;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/form_alta_reserva.phtml';
    }

    function showFormUpdate($book,$user){
        $usuario=$user;
        $reserva=$book;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/form_update.phtml';
    }

    function showReservasPorVehiculo($car,$reservas,$user){
        $usuario = $user;
        $vehiculo = $car;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/reservasPorVehiculo.phtml';
    }

    function showFormUpdateReserva($book,$cars,$user){
        $usuario=$user;
        $reserva=$book;
        $vehiculos = $cars;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/form_update_reserva.phtml';
    }
}
