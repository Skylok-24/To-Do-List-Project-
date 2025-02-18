<?php

namespace App\Core;

class Router
{
    private $get = [];
    private $post = [];
    public static function make()
    {
        $router = new Router();
        return $router;
    }
    public function get($uri,$action)
    {
        $this->get[$uri] = $action;
        return $this;
    }
    public function post($uri,$action)
    {
        $this->post[$uri] = $action;
        return $this;
    }
    public function resolve($uri,$method)
    {
        if (array_key_exists($uri,$this->{$method})) {
            $action = $this->{$method}[$uri];
            $this->callAction(...$action);
        }else {
            throw  new Exception('Page Not Found');
        }
    }

    public function callAction($controller,$action)
    {
        $method = new $controller;
        $method->{$action}();
    }
}