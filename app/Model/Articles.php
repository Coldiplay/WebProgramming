<?php

namespace App\Model;


class Articles
{
    public array $articles = [];
    public function __construct()
    {
        $this->articles = [];
        $article = new Article();
        $article->lines[] = "Вау";
        $article->lines[] = "Вау строка 2";
        $this->articles[] = $article;
    }

    public function addArticle($article) : void
    {
        $this->articles[] = $article;
    }

    public  function all() : array
    {
        return $this->articles;
    }
}