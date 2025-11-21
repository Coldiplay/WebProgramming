<?php
namespace App\Core;

use App\Traits\Helper;

class FileManager
{
    use Helper;
//    use Helper;
//    protected string $dir;
//
//    public function __construct(string $dir = CONTENT_DIR)
//    {
//        $this->dir = $dir;
//    }
//
//    public function listDirs($path)
//    {
//        $fullDir = $this->dir . ltrim($path, '/');
//        if (!is_dir($fullDir)) return false;
//        return array_filter(glob($fullDir . '/*'), 'is_dir');
//    }
//    public function listFiles(string $path = '', string $extension = '*')
//    {
//        $fullDir = $this->dir . ltrim($path, '/');
//        if ($this->checkPathTraversal($fullDir)) return false;
//        return array_filter(glob($fullDir . '/*.' . $extension), 'is_file');
//    }
//    public function readFile($path) {
//        $fullPath = $this->dir  . ltrim($path, '/');
//        if ($this->checkPathTraversal($fullPath) || !file_exists($fullPath)) return false;
//        return file_get_contents($fullPath);
//    }
//
//    private static function checkPathTraversal($path) : bool
//    {
//        // Защита от path traversal
//        if (strpos(realpath($path), $this->dir) !== 0) {
//            return true;
//        }
//        else
//            return false;
//    }
    public static function readFile(string $file_path) : ?string
    {
        if (!$file_path == realpath($file_path)) {
            $file_path = ROOT_DIR . ltrim($file_path, '/');
        }
        //if ($this->checkPathTraversal($fullPath) || !file_exists($fullPath)) return false;
        if (!file_exists($file_path)) return false;
        return file_get_contents($file_path);
    }
}