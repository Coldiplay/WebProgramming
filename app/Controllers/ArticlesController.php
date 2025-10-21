<?php

namespace app\Controllers;

use app\Model\Article;
use app\Views\ArticlesView;

class ArticlesController
{
    public Article $article;
    public ArticlesView $articleView;

    public function __construct(Article $article, ArticlesView $articleView)
    {
        $this->article = $article;
        $this->articleView = $articleView;

    }

    public function showArticlesList()
    {
        $articles = $this->article->getArticles();
        //$articles = $this->articles->all();
//        $path = $_SERVER['DOCUMENT_ROOT'] . '/templates/articles/articles_list.php';
        $path = TEMPLATE_PATH. 'layout.php';
        $this->articleView->showArticlesList($path, $articles);
    }
}