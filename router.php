<?php
include_once 'app/controllers/vehiculo.controller.php';
include_once 'app/controllers/home.controller.php';
include_once 'app/controllers/auth.controller.php';
include_once 'app/libs/response.libs.php';
include_once 'app/middlewares/seesion.auth.middleware.php';


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
    case "detalles": {
            sessionAuthMiddleware($res);
            $vehiculoController = new VehiculoControllers($res);
            $vehiculoController->showDetalles($params[1]);
            break;
        }
        case "modelos": {
            //var_dump($_GET);
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
    default: {
            header("HTTP/1.0 404 Not Found");
            break;
        }
}
