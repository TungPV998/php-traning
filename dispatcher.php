<?php

namespace AHT;

use AHT\Request;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);
        $controller = $this->loadController();
        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {

        $name = ucfirst($this->request->controller);
        $newsName = str_replace("Controller", "", $name);
        $file = "AHT\\Controllers\\". $newsName . 'Controller';
        $controller = new $file();
        return $controller;
    }

}