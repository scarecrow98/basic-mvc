<?php

namespace Core;

class Router {
    
    private $route;
    private $controller;
    private $action;
    private $param;

    public function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $this->route = explode('/', $url);

        $this->controller = !empty($this->route[0]) ? $this->route[0] : 'Home';
        $this->action = isset($this->route[1]) ? $this->route[1] : 'index';
        $this->param = isset($this->route[2]) ? $this->route[2] : null;
    }

    public function handle() {
        $class = '\App\Controllers\\' . $this->controller . 'Controller';

        if (class_exists($class)) {
            $object = new $class();
            
            if (!isset($this->action)) {
                $object->index();
                return;
            }
            
            if (method_exists($object, $this->action)) {
                $object->{$this->action}($this->param);
            } else {
                echo "A keresett oldal nem található";
            }
        } else {
            echo "A keresett oldal nem található";
        }
    }
}