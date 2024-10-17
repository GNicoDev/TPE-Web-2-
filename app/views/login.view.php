<?php

class LoginView {

    function showLogin($user){
        $usuario = $user;
        require 'templates/layout/header.phtml';
        require 'templates/login.phtml';
        require 'templates/layout/footer.phtml';

    }
}