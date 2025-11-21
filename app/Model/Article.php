<?php

namespace App\Model;

use DateTime;

class Article
{
    public int $id;
    public string $title;
    public string $image_path;
    public string $content;
    public string $category;
    public string $author;
    public string $author_image;
    public DateTime $date_created;
    public string $file_name;

    public function __construct(
        int $id,
        string $title,
        string $image,
        string $content,
        string $author,
        string $author_image,
        string $category = '',
        //DateTime $date_created = new DateTime(),
        string $file_name = ''
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->image_path = $image;
        $this->content = $content;
        $this->category = $category;
        $this->author = $author;
        $this->author_image = $author_image;
        //$this->date_created = $date_created;
    }

}