<?php
declare(strict_types=1);

use App\Interfaces\ArticleFactoryInterface;
use App\Interfaces\ArticleRepositoryInterface;
use League\Container;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Factories\ArticleFactory;
use App\Repositories\JsonArticleRepository;
use App\Controllers\FrontController;
use App\Views\FrontView;

$container = new Container\Container();

//twig environment
$container->add(Environment::class, function () {
    $loader = new FilesystemLoader(TEMPLATE_PATH);
    return new Environment($loader, []);
});

//Views
$container->add(FrontView::class)
    ->addArguments([Environment::class]);

//Factory
$container->add(ArticleFactoryInterface::class, ArticleFactory::class);

//Repository
$container->add(ArticleRepositoryInterface::class, JsonArticleRepository::class)->addArguments(['factory' => $container->get(ArticleFactoryInterface::class)]);

//Controllers
$container->add(FrontController::class)
    ->addArgument($container->get(ArticleRepositoryInterface::class))
    ->addArgument($container->get(FrontView::class));

$strategy = (new ApplicationStrategy)->setContainer($container);
$router = (new Router)->setStrategy($strategy);

return $router;
//