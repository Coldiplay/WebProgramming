<?php
declare(strict_types=1);

use League\Container;
use Twig;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$container = new Container();
$container->add(Environment::class, function () {
    $loader = new FilesystemLoader(TEMPLATE_PATH);
    return new Environment($loader, []);
});
//