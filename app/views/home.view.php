<?php

class HomeView
{

    function showHome($user)
    {
        $usuario = $user;
        require 'templates/layout/header.phtml';
        require 'templates/layout/buttonsHome.phtml';
        require 'templates/layout/footer.phtml';
    }
}
