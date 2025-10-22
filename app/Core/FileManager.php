<?php
namespace App\Core;

use App\Taits\Helper;

class FileManager
{
     use Helper;
    private $dir = '';

    public function __constructor(string $dir = CONTENT_DIR)
    {
        $this->dir = $dir;
        $this->GetCategories();
    }

    public function GetCategories() : array
    {
        $array = [];
        if (is_dir($this->dir)) {
            if ($dh = opendir($this->dir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") continue;

                    if (is_dir($file))
                        $array[] = $file;
                }
            }
        }
        return $array;
    }
    public function listDirs($path)
    {
        $fullDir = CONTENT_DIR . ltrim($path, '/');
        //$this->dd($fullDir);
        if (!is_dir($fullDir)) return [];
        return array_filter(glob($fullDir . '/*'), 'is_dir');
    }
    public function getArticlesInCategory(string $category) : array
    {
        $array = [];
        $dir = $this->dir.'/'.$category;
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") continue;
                    if (!is_dir($file)){
                        $file_contents = file_get_contents($file);
                        $endJsonPos = strpos($file_contents, "}");
                        $firstPart = json_decode(substr($file_contents, 0, $endJsonPos-1));
                        $contentMd = substr($file_contents, $endJsonPos+1, str_len($file)-$endJsonPos-1);
                        $array[] = [
                            'title' => $firstPart['title'],
                            'content' => $contentMd,
                            'image' => $firstPart['image'],
                            'author' => $firstPart['author'],
                            'authorImage' => $firstPart['authorImage'],
                        ];
                    }
                }
            }
        }
        return $array;
    }
}