<?php

namespace App\Repositories;

use App\Core\FileManager;
use App\Factories\ArticleFactory;
use App\Interfaces\ArticleRepositoryInterface;
use App\Model\Article;

class JsonArticleRepository implements ArticleRepositoryInterface
{
    private string $file;
    private ArticleFactory $factory;
    public function __construct(ArticleFactory $factory, string $file = ROOT_DIR . '/storage/article.json')
    {
        $this->factory = $factory;
        $this->file = $file;
    }

    public function getAll(): array
    {
        $articles = $this->read();
        return array_map([$this->factory, 'create'], $articles);
    }

    public function getById(int $article_id): ?Article
    {
        $articles = $this->read();
        foreach ($articles as $article) {
            if ($article->id === $article_id) {
                return $article;
            }
        }
        return null;
    }

    public function create(array $data): Article
    {
        $articles = $this->read();
        $id = max(array_column($articles, 'id')) + 1;
        $newArticle = ['id' =>$id] + $data;
        $newArticle['file_name'] = 'article_' . $id;
        $articles[] = $newArticle;
        $this->write($articles);
        return $this->factory->create($newArticle);
    }

    public function delete(int $article_id): bool
    {
        $articles = $this->read();
        $origCount = count($articles);
        $articles = array_filter($articles, fn($post) => $post['id'] !== $article_id);
        if ($origCount === count($articles)) return false;
        $this->write(array_values($articles));
        return true;
    }

    public function update(int $article_id, array $data): ?Article
    {
        $articles = $this->read();
        foreach ($articles as $article) {
            if ($article->id === $article_id) {
                $article = ['id' => $article_id] + $data;
                $this->write($articles);
                $article['file_name'] = 'article_' . $article_id;
                return $this->factory->create($article);
            }
        }
        return null;
    }

    private function read() : array
    {
        return json_decode(FileManager::readFile($this->file), true) ?: [];
    }
    private function write(array $articles) : void
    {
        file_put_contents($this->file, json_encode($articles, JSON_PRETTY_PRINT));
    }
}