<?php

namespace app\Controllers;

use App\Core\FileManager;
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
        $manager = new FileManager();
        $articles = $this->article->getArticles();
//        $articles = [];
//        $categories = $manager->getCategories();
//        foreach ($categories as $category) {
//            $articles[] = $manager->GetArticlesInCategory($category);
//        }

        //$articles = $this->articles->all();
//        $path = $_SERVER['DOCUMENT_ROOT'] . '/templates/articles/articles_list.php';
        $path = TEMPLATE_PATH. 'layout.php';
        $this->articleView->showArticlesList($path, $articles);
    }
}