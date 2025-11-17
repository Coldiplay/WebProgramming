<?php

namespace App\Interfaces;

use App\Model\Article;

interface ArticleRepositoryInterface
{
    public function getAll() : array;
    public function getById(int $article_id) : ?Article;
    public function create(array $data): Article;
    public function delete(int $article_id) : bool;
    public function update(int $article_id, array $data): ?Article;
}