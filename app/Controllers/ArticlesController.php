<?php

namespace app\Controllers;

use App\Core\FileManager;
use app\Model\Article;
use App\Taits\Helper;
use app\Views\ArticlesView;

class ArticlesController
{
    use Helper;
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
            $category_path = 'posts/' . basename($categoryPath);
            $categories[] = ['title' => basename($category_path), 'countElements' => count($this->fm->listFiles($category_path))];
        }
        $path = TEMPLATE_PATH . 'layout.php';
        $this->articleView->showArticlesList($path, $articles, $categories);
    }
    public function getAndShowArticle($article_path)
    {
       $article = $this->article->getArticleFromFM($article_path);
       $path = TEMPLATE_PATH . 'single_Article_Layout.php';
       $this->articleView->showArticle($path ,$article);
    }


}