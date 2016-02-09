<?php
require 'vendor/autoload.php';

$router = new App\Router\Router($_GET['url']);
$router->get('/', function(){ echo "Homepage"; });
$router->get('/posts', function(){ echo 'Tous les articles'; });
$router->get('/article/:slug-:id/:page', "Posts#show")->with('id', '[0-9]+')->with('page', '[0-9]+')->with('slug', '([a-z\-0-9]+)');
$router->get('/article/:slug-:id', "Posts#show")->with('id', '[0-9]+')->with('slug', '([a-z\-0-9]+)');
$router->post('/posts/:id', function($id){ echo 'Poster pour l\'article ' . $id . '<pre>' . print_r($_POST, true) . '</pre>'; });
$router->get('/home', "Home#");

use ORM\Entity\Manager;
use Config\ORM;
$ORM = new ORM();

$Post = new Post\Post(); //New post
$Post->setTitle('My post title'); //Insert title
$Post->setContent('My post content'); //Insert content
$ORM->EM->persist($Post); //Insert post in database

$router->run();