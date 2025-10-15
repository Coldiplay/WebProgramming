<?php

namespace App\Controllers;

use App\Models\Articles;
use App\Views\ArticleView;

class ArticlesController
{
    public Articles $articles;
    public ArticleView $articleView;

    public function __construct(Articles $articles, ArticleView $articleView)
    {
        $this->articles = $articles;
        $this->articleView = $articleView;

    }

    public function showArticlesList()
    {
        $articles = $this->articles->all();
//        $path = $_SERVER['DOCUMENT_ROOT'] . '/templates/articles/articles_list.php';
        $path = $_SERVER['DOCUMENT_ROOT'] . '/index.php';
        $this->articleView->showArticlesList($path, $articles);
    }
}