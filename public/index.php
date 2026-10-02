<?php

use App\Controllers\IncomesController;
use App\Controllers\WithdrawalController;
use App\Enums\IncomeTypeEnum;
use App\Enums\PaymentMethodEnum;
use App\Enums\WithdrawalTypeEnum;
use Router\RouterHandler;

require("../vendor/autoload.php");
//Instancia del router
$router = new RouterHandler();
//Obtener la URL
$slug = $_GET["slug"] ?? null;
$slug = explode("/", $slug);

$resource = $slug[0] == "" ? "/" : $slug[0];
$id = $slug[1] ?? null;

switch ($resource) {
    case '/':
        echo "Bienvenido a la API de finanzas personales";
        break;
    case "incomes":
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(IncomesController::class, $id);

        break;
    case "withdrawals":
        $router->set_method($_POST["method"] ?? "get");
        $router->set_data($_POST);
        $router->route(WithdrawalController::class, $id);
        break;
    default:
        echo "404 Not Found";
        break;
}
