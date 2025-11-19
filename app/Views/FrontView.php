<?php

namespace App\Views;

use Twig\Environment;

class FrontView
{
    private Environment $twig;
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function articlesList(array $articles): string
    {
        return $this->twig->render('front/pages/articlesList.html.twig', ['articles' => $articles]);
    }
}