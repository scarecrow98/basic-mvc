<?php

namespace Core;

use \App\Controllers\ErrorController;

class Router {
    
    private $route;
    private $controller;
    private $action;
    private $param;

    public function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $this->route = explode('/', $url);

        $this->controller = !empty($this->route[0]) ? ucfirst(strtolower($this->route[0])) : 'Home';
        $this->action = isset($this->route[1]) ? strtolower($this->route[1]) : 'index';
        $this->param = isset($this->route[2]) ? $this->route[2] : null;
    }

    public function handle() {
        $namespace = '\App\Controllers\\';
        $class = $namespace . $this->controller . 'Controller';

        if (class_exists($class)) {
            $object = new $class();
            
            if (!isset($this->action)) {
                $object->index();
                return;
            }
            
            if (method_exists($object, $this->action)) {
                $object->{$this->action}($this->param);
            } else {
                ErrorController::err404();
            }
        } else {
            ErrorController::err404();
        }
    }
}