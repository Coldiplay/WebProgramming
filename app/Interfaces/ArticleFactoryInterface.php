<?php

namespace App\Interfaces;

use App\Model\Article;

interface ArticleFactoryInterface
{
    public function create(array $data): Article;
}