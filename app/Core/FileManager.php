<?php
namespace App\Core;

use App\Taits\Helper;

class FileManager
{
    use Helper;
    public string $dir;

    public function __construct(string $dir = CONTENT_DIR)
    {
        $this->dir = $dir;
    }

    public function listDirs($path)
    {
        $fullDir = $this->dir . ltrim($path, '/');
        if (!is_dir($fullDir)) return [];
        return array_filter(glob($fullDir . '/*'), 'is_dir');
    }
    public function listFiles(string $path = '', string $extension = '*')
    {
        $fullDir = $this->dir . ltrim($path, '/');
        if (strpos(realpath($fullDir), $this->dir) !== 0) {
            return false;
        }
        return array_filter(glob($fullDir . '/*'), 'is_file');
    }
    public function readFile($path) {
        $fullPath = $this->dir  . ltrim($path, '/');
        // Защита от path traversal
        if (strpos(realpath($fullPath), $this->dir) !== 0) {
            return false;
        }
        if (!file_exists($fullPath)) return false;
        return file_get_contents($fullPath);
    }

}