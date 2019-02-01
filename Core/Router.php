<?php

namespace Core;

use \App\Controllers\ErrorController;
use Exception;

class Router {
    
    private $routes;
    private $url;
    private $controller;
    private $action;
    private $params;
    private $query_string;
    private $method;

    public function __construct($url, $method) {
        $this->url = '/' . strtolower(rtrim($url, '/'));
        $this->method = $method;
    }

    public function handleRequest() {
        $matched_route = $this->matchRoute();

        if ($matched_route) {
            $this->controller = $matched_route['controller'];
            $this->action = $matched_route['action'];
            $this->params = isset($matched_route['params']) ? $matched_route['params'] : null;

            $this->callAction();

        } else {
            ErrorController::err404();
        }
    }

    private function callAction() {
        $controller_object = $this->getControllerObject();
        $action_name = $this->getActionName();

        $controller_object->{$action_name}($this->params);
    }

    private function getActionName() {
        return $this->action;
    }

    private function getControllerObject() {
        $namespace = '\App\Controllers\\';
        $class = $namespace . $this->controller . 'Controller';

        if (!class_exists($class)) {
            throw new Exception("Given controller is not found: $this->controller");
        }

        return new $class();
    }

    private function matchRoute() {
        foreach ($this->routes as $route => $route_setting) {
            if (preg_match($route, $this->url, $matches)) {            
                if (count($matches) > 1) {
                    $route_setting['params'] = $matches[1];
                }

                return $route_setting;
            }
        }

        return null;
    }

    private function parseRoute($route) {
        return '/' . strtolower($route);
    }

    public function addRoute($route, $controller, $action) {
        $route = preg_replace('/\//', '\\/', $route);
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = [
            'controller'    => $controller,
            'action'        => $action
        ];
    }
}