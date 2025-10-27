<?php

namespace App\Views;
use App\Core\FileManager;
use App\Taits\Helper;

class ArticlesView
{
    use Helper;
    protected $html;
    public function showArticlesList(string $path, array $articles, array $categories)//, array $articles)
    {
        $articlesData = '';
        $categoriesData = '';
        foreach ($categories as $category) {
            $categoriesData .= '<li>
                                    <a href="#">
                                        <div class="inline-text">
                                            <i class="glyphicon glyphicon-play blue-text"></i>
                                            <h4>'.$category.'</h4>
                                            <div class="margin-left-auto blue-text">
                                                <span>(11)</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>';
        }
        foreach ($articles as $article) {
            $meta = $article['meta'];
            $articlesData .= '<div class="single-post">
                            <div class="blog-img">
                                <a href="">
                                    <img src="'.$meta['image'].'" class="img-responsive">
                                </a>
                            </div>
                            <h2 class="blog-title">'.$meta['title'].'</h2>
                            <div class="blog-meta">2 Feb 2018 <a href="">(3) Comments</a></div>
                            <p>'.$article['body'].'</p>
                            <div class="blog-btn">
                                <a href="#" class="btn-default">Подробнее</a>
                                <div class="img-inline"><img src="'.$meta['authorImage'].'"><a href="#">'.$meta['author'].'</a>
                                </div>
                            </div>
                        </div>';
        }

        print $this->html = include_once($path);
    }

    public function showArticle(string $path,?array $article)
    {
        $data = '<div class="single-post">
                            <div class="blog-img">
                                <a href="">
                                    <img src="'.$article['image'].'" class="img-responsive">
                                </a>
                            </div>
                            <h2 class="blog-title">'.$article['title'].'</h2>
                            <div class="blog-meta">2 Feb 2018 <a href="">(3) Comments</a></div>
                            <p>'.$article['content'].'</p>
                            <div class="blog-btn">
                                <a href="#" class="btn-default">Подробнее</a>
                                <div class="img-inline"><img src="'.$article['authorImage'].'"><a href="#">'.$article['author'].'</a>
                                </div>
                            </div>
                        </div>';
        print $this->html = include_once($path);
    }
}