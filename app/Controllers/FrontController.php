<?php

namespace App\Controllers;

use App\Interfaces\ArticleFactoryInterface;

class FrontController
{
    private ArticleFactoryInterface $articleFactory;
    public function __construct(ArticleFactoryInterface $articleFactory)
    {
        $this->articleFactory = $articleFactory;
    }



}