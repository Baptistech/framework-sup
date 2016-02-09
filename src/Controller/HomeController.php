<?php

namespace App\Controller;


class HomeController
{

    public $home;

    public function __construct(){
        $loader = new \Config\Twig('home.html.twig');
        $loader->render
        (
            array(

            )
        );
    }

}