<?php

require __DIR__.'/vendor/autoload.php';
require_once './config/settings.php';

//Отображение ошибок
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

//Создание маршрутизатора
$router = require (ROOT_DIR.'/app/bootstrap.php');
//Пихаем в запрос всё
$request = \Laminas\Diactoros\ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);

//Создание маршрутов
//$router->map('GET', '/', ArticlesController::class.'@index');
$router->map('GET', '/articles', 'App\Controllers\FrontController::index');
$router->map('GET', '/article/{id}', 'App\Controllers\FrontController::singleArticle');

$response = $router->dispatch($request);

//try {
//
//
//}
//catch (\League\Route\Http\Exception\NotFoundException $exc)
//{
//    //$response = $router->dispatch();
//}
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);

?>