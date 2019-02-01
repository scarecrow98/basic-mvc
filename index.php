<?php

    use \Core\Router;
    use \Core\View;

    require_once 'Core/autoload.php';
    $config = include('Core/config.php');

    View::render('header.php');

    $router = new Router();
    $router->handle();

    View::render('footer.php');
?>