<?php


namespace app\engine;

use app\interfaces\IRenderer;
//require_once '../vendor/autoload.php';

class TwigRender implements IRenderer
{

    public $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }


    public function renderTemplate($template, $params = []) {
//var_dump($params);
       return $this->twig->render($template . '.twig', $params);
    }
}