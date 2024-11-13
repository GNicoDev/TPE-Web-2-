<?php
include_once 'app/controllers/vehiculo.controller.php';
include_once 'app/controllers/reserva.controller.php';
include_once 'app/controllers/home.controller.php';
include_once 'app/controllers/auth.controller.php';

include_once 'app/libs/response.libs.php';

include_once 'app/middlewares/seesion.auth.middleware.php';
include_once 'app/middlewares/verify.auth.middleware.php';



define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$res = new Response();

if (!empty($_GET["action"])) {
    $action = $_GET["action"];
} else
    $action = "home";


$params = explode("/", $action);


switch ($params[0]) {
    case "home": {
            sessionAuthMiddleware($res);
            $homeController = new HomeController($res);
            $homeController->showHome();
            break;
        }

    case "catalogo": {
            sessionAuthMiddleware($res);
            $vehiculoController = new VehiculoControllers($res);
            $vehiculoController->showCatalogo();
            break;
        }
    case "detalleVehiculo": {
            sessionAuthMiddleware($res);
            $vehiculoController = new VehiculoControllers($res);
            $vehiculoController->showDetalles($params[1]);
            break;
        }
        case "modelos": {
           // var_dump($_POST);
            sessionAuthMiddleware($res);
            $vehiculoController = new VehiculoControllers($res);
            $vehiculoController->showVehiculosByModelo();
            break;
        }
        case "sign-in": {
            sessionAuthMiddleware($res);
            $controller = new AuthController($res);
            $controller->showSignIn();
            break;
        }
        case "login":  {   
            sessionAuthMiddleware($res);
            $controller = new AuthController($res);
            $controller->login();
            break;
        }
        case "logout": {
            $controller = new AuthController($res);
            $controller->logout();
            break;
        }
        case "servicios": {
            sessionAuthMiddleware($res);
            $homeController = new HomeController($res);
            $homeController->showServiciosC();
            break;
        }
        case "contactos": {
            sessionAuthMiddleware($res);
            $homeController = new HomeController($res);
            $homeController->showContactosC();
            break;
        }
        case "showFormAltaVehiculo": {
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $controller = new VehiculoControllers($res);
            $controller->showFormAltaController();
            break;
        }
        case "insertarVehiculo": {
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $controller = new VehiculoControllers($res);
            $controller->nuevoVehiculo();
            break;
        }
        case "eliminarVehiculo": {
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $controller = new VehiculoControllers($res);
            $controller->eliminarVehiculo($params[1]);
            break;
        }
        case "showFormActualizarVehiculo": {
            //var_dump($params);
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $controller = new VehiculoControllers($res);
            $controller->showFormActualizar($params[1]);
            break;
        }
        case "actualizarVehiculo": {
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $controller = new VehiculoControllers($res);
            $controller->actualizarVehiculo($params[1]);
            break;
        }
        case "reservas": {
            sessionAuthMiddleware($res);
            $reservaController = new ReservaController($res);
            $reservaController->showReservas($res);
            break;
        }
        case "detallesReserva": {
            sessionAuthMiddleware($res);
            $reservaController = new ReservaController($res);
            $reservaController->showDetalleReserva($params[1]);
            break;
        }
        case "reservasPorVehiculo": {
            sessionAuthMiddleware($res);
            $reservaController = new ReservaController($res);
            $reservaController->showReservasPorVehiculo();
            break;
        }
        case "showFormAltaReserva": {
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $controller = new ReservaController($res);
            $controller->showFormAltaController();
            break;
        }
        case "insertarReserva": {
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $controller = new ReservaController($res);
            $controller->nuevaReserva();
            break;
        }
        case "showFormActualizarReserva": {
            //var_dump($params);
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $controller = new ReservaController($res);
            $controller->showFormActualizar($params[1]);
            break;
        }
        case "actualizarReserva": {
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $controller = new ReservaController($res);
            $controller->actualizarReserva($params[1]);
            break;
        }
        case "eliminarReserva": {
            sessionAuthMiddleware($res);
            verifyAuthMiddleware($res);
            $controller = new ReservaController($res);
            $controller->eliminarReserva($params[1]);
            break;
        }
    default: {
            header("HTTP/1.0 404 Not Found");
            break;
        }
}
