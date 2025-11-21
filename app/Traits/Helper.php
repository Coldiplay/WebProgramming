<?php

namespace App\Traits;

trait Helper
{
    public static function dd($something)
    {
        echo '<pre>';
        var_dump($something);
        echo '</pre>';
        //exit();
    }
}