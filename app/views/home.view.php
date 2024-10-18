<?php

class HomeView
{

    function showHome($user)
    {
        $usuario = $user;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/layout/buttonsHome.phtml';
        require_once 'templates/layout/footer.phtml';
    }

    function showServicios($user)
    {
        $usuario = $user;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/servicios.phtml';
        require_once 'templates/layout/footer.phtml';
    }

    function showContactos($user)
    {
        $usuario = $user;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/contactos.phtml';
        require_once 'templates/layout/footer.phtml';
    }
}
