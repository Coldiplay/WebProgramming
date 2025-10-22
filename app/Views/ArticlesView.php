<?php

namespace App\Views;
use App\Core\FileManager;

class ArticlesView
{
    protected $html;
    public function showArticlesList(string $path, array $articles)//, array $articles)
    {
        $manager = new FileManager();

        $categories = $manager->listDirs('posts');

        $data = implode('', $categories);
        $data .= 'asdasd';
        foreach ($articles as $article) {
            $data .= '<div class="single-post">
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
        }

        print $this->html = include_once($path);
    }
}