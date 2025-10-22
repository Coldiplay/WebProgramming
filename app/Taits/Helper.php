<?php

namespace App\Taits;

trait Helper
{
    public function dd($something)
    {
        echo '<pre>';
        var_dump($something);
        echo '</pre>';
        exit();
    }
}