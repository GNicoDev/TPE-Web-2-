<?php

class Mensaje {
    private $tipo = null; // toma 2 tipos: 'mensaje' y 'error'


function showMensaje($mensaje,$tipo,$user){
    $this->tipo = $tipo;
    $usuario = $user;
    require_once 'templates/layout/header.phtml';
    require_once 'templates/mensaje.phtml';
}
}