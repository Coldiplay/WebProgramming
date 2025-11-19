<?php

namespace App\Controllers;

use App\Interfaces\ArticleRepositoryInterface;
use App\Views\FrontView;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class FrontController
{
    private ArticleRepositoryInterface $articleFactory;
    private FrontView $frontView;
    public function __construct(ArticleRepositoryInterface $articleFactory, FrontView $frontView)
    {
        $this->articleFactory = $articleFactory;
        $this->frontView = $frontView;
    }
    public function index(ServerRequestInterface $request) : ResponseInterface
    {
        $articles = $this->articleFactory->getAll();
        $html = $this->frontView->articlesList($articles);
        return $this->responseWrapper($html);
    }


    private function responseWrapper(string $str) : ResponseInterface
    {
        $response = new \Laminas\Diactoros\Response();
        $response->getBody()->write($str);
        return $response;
    }
}