<?php

namespace App\Factories;

use App\Interfaces\ArticleFactoryInterface;
use App\Model\Article;
use App\Traits\Helper;
use Michelf\Markdown;

class ArticleFactory implements ArticleFactoryInterface
{
    use Helper;
    public function create(array $data): Article
    {
        return new Article
        (
            (int)$data['id'],
            (string)$data['title'],
            (string)$data['image_path'],
            (string)(Markdown::defaultTransform($data['content'])),
            (string)$data['category'] ?? '',
            (string)$data['author'],
            (string)$data['author_image'],
            //DateTime::createFromFormat('Y-m-d H:i:s', $data['created_at']),
            (string)$data['file_name'] ?? ''
        );
    }
}