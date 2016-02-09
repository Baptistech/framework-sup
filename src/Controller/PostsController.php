<?php

namespace App\Controller;


class PostsController {

    public function show($slug, $id, $page){
        echo "Je suis l'article $id Je suis en page" . $page;
    }

}