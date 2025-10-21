<?php

namespace App\Core;

class FileManager
{
    private $dir = '';

    public function __constructor(string $dir = CONTENT_DIR)
    {
        $this->dir = $dir;

    }

    public function GetCategories()
    {
        $array = [];
        if ($dh = opendir($this->dir)) {
            while (($file = readdir($dh)) !== false) {
                if ($file != "." && $file != "..") continue;

                if (is_dir($file))
                    $array[] = $file;
            }
        }

    }

}