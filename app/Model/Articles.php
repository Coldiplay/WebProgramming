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
class Article
{
    public array $lines = [];
    protected array $articles = [];
    public int $imagePosition;
    public string $imageRoute;

    public function __construct()
    {
        $this->articles = [
          [
              'title'=>'jhg',
              'image'=>'assets/images/people-03.jpg',

          ],
          [

          ]
        ];

    }
    public function addLineByIndex(string $line, int $position) : void
    {
        $this->lines[$position][] = $line;
    }
    public function addLine(string $line) : void
    {
        $this->lines[] = $line;
    }

    public function changeLines(array $lines) : void
    {
        $this->lines = $lines;
    }
}