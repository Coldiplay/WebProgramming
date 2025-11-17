<?php

require __DIR__.'/vendor/autoload.php';
require_once './config/settings.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = require (ROOT_DIR.'/app/bootstrap.php');
$request = ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);

//$router->map('GET', '/', ArticlesController::class.'@index');

$response = $router->dispatch($request);
//(new SapiEmitter)

?>