<?php

namespace App\Views;
use App\Traits\Helper;

class ArticlesView
{
    use Helper;
    protected $html;
    public function showArticlesList(string $template_path, array $articles, array $categories)
    {
        $articlesData = $this->structArticlesIntoHtml($articles);
        $categoriesData = $this->structCategoriesIntoHtml($categories);
        print $this->html = include_once($template_path);
    }
    public function showArticle(string $path, array $article, array $categories)
    {
        $article_data = $this->structSingleArticleIntoHtml($article);
        $categories_data = $this->structCategoriesIntoHtml($categories);
        print $this->html = include_once($path);
    }
    public function show404(string $path)
    {
        print $this->html = include_once($path);
    }

    private function structCategoriesIntoHtml(array $categories) : string
    {
        $categoriesData = '';
        foreach ($categories as $category) {
            $categoriesData .= '<li>
                                    <a href="#">
                                        <div class="inline-text">
                                            <i class="glyphicon glyphicon-play blue-text"></i>
                                            <h4>' . $category['title'] . '</h4>
                                            <div class="margin-left-auto blue-text">
                                                <span>' . $category['countElements'] . '</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>';
        }
        return $categoriesData;
    }
    private function structArticlesIntoHtml(array $articles) : string
    {
        $articlesData = '';
        foreach ($articles as $article) {
            $meta = $article['meta'];
            $articlesData .= '<div class="single-post">
                            <div class="blog-img">
                                <a href="">
                                    <img src="'.$meta['image'].'" class="img-responsive">
                                </a>
                            </div>
                            <h2 class="blog-title">'.$meta['title'].'</h2>
                            <div class="blog-meta">'.$meta['date_created'].' 
                                <a href="">(3) Comments</a>
                            </div>
                            <p>'.$article['body'].'</p>
                            <div class="blog-btn">
                                <a href="#" class="btn-default">Подробнее</a>
                                <div class="img-inline"><img src="'.$meta['authorImage'].'"><a href="#">'.$meta['author'].'</a>
                                </div>
                            </div>
                        </div>';
        }
        return $articlesData;
    }
    private function structSingleArticleIntoHtml(array $article) : string
    {
        $articleData = '';
        $meta = $article['meta'];
        $articleData .= '<div class="single-post">
                            <div class="blog-img">
                                <a href="">
                                    <img src="'.$meta['image'].'" class="img-responsive">
                                </a>
                                <div class="blog-icon"><img src="images/icon2.png"></div>
                            </div>
                            <h2 class="blog-title">'.$meta['title'].'</h2>
                            <div class="blog-meta">
                                <a href="" class="ml-0"><i class="blue-text fa fa-calendar"></i>'.$meta['date_created'].'</a>
                                <a href=""><i class="blue-text fa fa-user"></i> By Admin</a>
                                <a href=""><i class="blue-text fa fa-comment"></i>(3) Comments</a>
                            </div>
                            '.$article['body'].'
                        </div>';
        return $articleData;
    }


}