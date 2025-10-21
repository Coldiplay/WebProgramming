<?php

namespace app\Controllers;

use app\Model\Articles;
use app\Views\ArticlesView;

class ArticlesController
{
    public Articles $articles;
    public ArticlesView $articleView;

    public function __construct(Articles $articles, ArticlesView $articleView)
    {
        $this->articles = $articles;
        $this->articleView = $articleView;

    }

    public function showArticlesList()
    {
        $articles = $this->articles->all();
//        $path = $_SERVER['DOCUMENT_ROOT'] . '/templates/articles/articles_list.php';
        $path = TEMPLATE_PATH. 'layout.php';
        $this->articleView->showArticlesList($path, $articles);
    }
}