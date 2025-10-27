<?php

namespace app\Controllers;

use App\Core\FileManager;
use app\Model\Article;
use app\Views\ArticlesView;

class ArticlesController
{
    public Article $article;
    public ArticlesView $articleView;
    private FileManager $fm;

    public function __construct(Article $article, ArticlesView $articleView)
    {
        $this->article = $article;
        $this->articleView = $articleView;
        $this->fm = new FileManager();

    }

    public function showArticlesList()
    {
        $articles = $this->article->getArticlesFromFM("posts", $this->fm);
        $categoriesPaths = $this->fm->listDirs('posts');
        $categories = [];
        foreach ($categoriesPaths as $categoryPath) {
            $categories[] = ['title' => basename($categoryPath), 'countElements' => count($this->fm->listFiles($categoryPath))];
        }
        //$articles = $this->articles->all();
        //$path = $_SERVER['DOCUMENT_ROOT'] . '/templates/articles/articles_list.php';
        $path = TEMPLATE_PATH . 'layout.php';
        $this->articleView->showArticlesList($path, $articles, $categories);
    }
    public function getAndShowArticle($path)
    {
       $article = $this->article->getArticle($path);
       $this->articleView->showArticle($article);
    }


}