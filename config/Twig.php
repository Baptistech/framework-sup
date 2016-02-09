<?php
/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 08/02/2016
 * Time: 15:10
 */

namespace Config;

class Twig
{
    public $twig;
    public $template;

    public function __construct ($template){
        $loader = new \Twig_Loader_Filesystem('Ressources/views');
        $this->twig = new \Twig_Environment($loader, array(
            'cache' => false
        ));
        $this->template = $this->twig->loadTemplate($template);
    }

    public function render(array $array) {
        echo $this->template->render($array);
    }
}