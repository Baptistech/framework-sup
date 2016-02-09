<?php

namespace App\Router;

class Router {

    private $url;
    private $routes = [];
    private $namedRoutes = [];

    public function __construct($url){
        $this->url = $url;
    }

    public function get($path, $callable, $name = null){
        return $this->add($path, $callable, $name, 'GET');
    }

    public function post($path, $callable, $name = null){
        return $this->add($path, $callable, $name, 'POST');
    }

    private function add($path, $callable, $name, $method){
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if(is_string($callable) && $name === null){
            $name = $callable;
        }
        if($name){
            $this->namedRoutes[$name] = $route;
        }
        return $route;
    }

    public function run(){
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new RouterException('REQUEST_METHOD does not exist');
        }
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->match($this->url)){
                $this->urlSave($this->url);
                return $route->call();
            }
        }
        $this->urlSave($_SERVER['REQUEST_URI']);
        throw new RouterException('No matching routes');
    }

    public function url($name, $params = []){
        if(!isset($this->namedRoutes[$name])){
            throw new RouterException('No route matches this name');
        }
        return $this->namedRoutes[$name]->getUrl($params);
    }

    public function urlSave($url) {
        if (!file_exists("access.log")) {
            file_put_contents("access.log", "");
        }
        file_put_contents("access.log",date("[j/m/y H:i:s]")." - ". $url . "\r\n".file_get_contents("access.log"));
    }

    public function errorLog($error) {
        if (!file_exists("error.log")){
            file_put_contents("error.log", "");
        }
        file_put_contents("error.log",date("[j/m/y H:i:s]")." - ". $error . "\r\n".file_get_contents("error.log"));
    }

}