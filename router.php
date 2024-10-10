<?php
include_once 'app/controllers/vehiculo.controller.php';
include_once 'app/controllers/home.controller.php';


define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');


if (!empty($_GET["action"])) {
    $action = $_GET["action"];
} else
    $action = "home";


$params = explode("/", $action);


switch ($params[0]) {
    case "home": {
            $homeController = new HomeController();
            $homeController->showHome();
            break;
        }

    case "catalogo": {
            $vehiculoController = new VehiculoControllers();
            $vehiculoController->showCatalogo();
            break;
        }
    case "detalles": {
            $vehiculoController = new VehiculoControllers();
            $vehiculoController->showDetalles($params[1]);
            break;
        }

    default: {
            header("HTTP/1.0 404 Not Found");
            break;
        }
}
