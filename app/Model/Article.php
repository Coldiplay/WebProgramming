<?php

namespace App\Model;

use App\Core\FileManager;
use App\Traits\Helper;
use FastVolt\Helper\Markdown;

class Article
{
    use Helper;
    //public array $lines = [];
    private array $articles = [];
    //public int $imagePosition;
    //public string $imageRoute;
    private Markdown $markdown;

    public function __construct()
    {
//        $this->articles = [
//                [
//                    'title' => 'Image Post For Insurance Press',
//                    'image' => 'assets/images/slider-img.jpg',
//                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris hendrerit fringilla ligula, nec congue leosdsdsd pharetra in. lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris hendrerit fringilla ligula, nec congue leo pharetra in.',
//                    'author' => 'тётя Клава',
//                    'authorImage' => 'assets/images/people-03.jpg',
//                ],
//                [
//                    'title' => 'How Insurance Saves Your Business',
//                    'image' => 'assets/images/slider-img1.jpg',
//                    'content' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
//                    'author' => 'Иван Петров',
//                    'authorImage' => 'assets/images/people-01.jpg',
//                ],
//                [
//                    'title' => 'Top 5 Insurance Myths Debunked',
//                    'image' => 'assets/images/slider-img2.jpg',
//                    'content' => 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vivamus suscipit tortor eget felis porttitor volutpat. Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada.',
//                    'author' => 'Анна Смирнова',
//                    'authorImage' => 'assets/images/people-02.jpg',
//                ],
//                [
//                    'title' => 'Family Insurance: What You Need to Know',
//                    'image' => 'assets/images/slider-img3.jpg',
//                    'content' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Nulla quis lorem ut libero malesuada feugiat. Sed porttitor lectus nibh. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.',
//                    'author' => 'Сергей Иванов',
//                    'authorImage' => 'assets/images/people-04.jpg',
//                ],
//                [
//                    'title' => 'Car Insurance Tips for New Drivers',
//                    'image' => 'assets/images/slider-img4.jpg',
//                    'content' => 'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi, pretium ut lacinia in, elementum id enim.',
//                    'author' => 'Мария Козлова',
//                    'authorImage' => 'assets/images/people-05.jpg',
//                ],
//                [
//                    'title' => 'Health Insurance in the Modern Age',
//                    'image' => 'assets/images/slider-img5.jpg',
//                    'content' => 'Nulla porttitor accumsan tincidunt. Vivamus suscipit tortor eget felis porttitor volutpat. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.',
//                    'author' => 'Дмитрий Лебедев',
//                    'authorImage' => 'assets/images/people-05.jpg',
//                ],
//                [
//                    'title' => 'Travel Insurance: Don’t Leave Home Without It',
//                    'image' => 'assets/images/slider-img6.jpg',
//                    'content' => 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla quis lorem ut libero malesuada feugiat. Donec rutrum congue leo eget malesuada.',
//                    'author' => 'Елена Волкова',
//                    'authorImage' => 'assets/images/people-02.jpg',
//                ],
//                [
//                    'title' => 'Home Insurance Essentials',
//                    'image' => 'assets/images/slider-img8.jpg',
//                    'content' => 'Sed porttitor lectus nibh. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictum porta. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.',
//                    'author' => 'Алексей Новиков',
//                    'authorImage' => 'assets/images/people-01.jpg',
//                ],
//                [
//                    'title' => 'Life Insurance Planning for the Future',
//                    'image' => 'assets/images/slider-img7.jpg',
//                    'content' => 'Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus. Nulla porttitor accumsan tincidunt. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
//                    'author' => 'Ольга Морозова',
//                    'authorImage' => 'assets/images/people-04.jpg',
//                ],
//                [
//                    'title' => 'Insurance Trends in 2024',
//                    'image' => 'assets/images/slider-img9.jpg',
//                    'content' => 'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec sollicitudin molestie malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Nulla quis lorem ut libero malesuada feugiat.',
//                    'author' => 'Николай Соколов',
//                    'authorImage' => 'assets/images/people-03.jpg',
//                ]
//
//        ];
        $this->markdown = new Markdown();
    }

    /**
     * @return array
     */
    public function getArticles(): array
    {
        return $this->articles;
    }
    public function getArticlesFromFM(string $category, FileManager $fileManager, bool $decode_markdown = false): array
    {
        $articlesPaths = $fileManager->listFiles($category);
        $articles = [];
        if ($articlesPaths) {
            foreach ($articlesPaths as $articlePath) {
                $articles[] = $this->getArticleFromFM($articlePath, $fileManager, $decode_markdown);
            }
        }
        return $articles;
    }

    public function getArticleFromFM(string $path, FileManager $fileManager, bool $decode_markdown = false)
    {
        $content = $fileManager->readFile('posts/' . basename($path));
        if (!$content) return null;
        $parts = explode("\n---\n", $content, 2);
        $meta = json_decode($parts[0], true) ?: [];
        if ($decode_markdown) {
            $this->markdown->setContent($parts[1]);
            $parts[1] = $this->markdown->toHtml();
        }
        return ['meta' => $meta, 'body' => $parts[1] ?? ''];
    }
}