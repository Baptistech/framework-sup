<?php
/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 10/02/2016
 * Time: 12:23
 */

namespace App\Controller;


class BaseController
{
    public $home;

    public function __construct(){
        $loader = new \Config\Twig('base.html.twig');
        $loader->render
        (
            array(
                'cache' => false
            )
        );
    }

}