<?php

namespace App\Views;
class ArticlesView
{
    protected $html;
    public function showArticlesList(string $path)//, array $articles)
    {
        $data ='<div class="single-post">
                            <div class="blog-img">
                                <a href="">
                                    <img src="assets/images/slider-img.jpg" class="img-responsive">
                                </a>
                            </div>
                            <h2 class="blog-title">Image Post For Insurance Press</h2>
                            <div class="blog-meta">2 Feb 2018 <a href="">(3) Comments</a></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris hendrerit fringilla ligula, nec congue leosdsdsd pharetra in.lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris hendrerit fringilla ligula, nec congue leo pharetra in.</p>
                            <div class="blog-btn">
                                <a href="#" class="btn-default">Подробнее</a>
                                <div class="img-inline"><img src="assets/images/people-03.jpg"><a href="#">тётя Клава</a>
                                </div>
                            </div>
                        </div>';

        print $this->html = include_once($path);
    }
}