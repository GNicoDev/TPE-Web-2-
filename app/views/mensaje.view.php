<?php

class Mensaje {
    private $tipo = null; // toma 2 tipos: 'mensaje' y 'error'


function showMensaje($mensaje,$tipo){
    $this->tipo = $tipo;
    require 'templates/layout/header.phtml';
    require 'templates/mensaje.phtml';
}
}