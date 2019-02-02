<?php
    use \Core\Router;
    use \Core\View;
    require_once 'Core/autoload.php';

    global $config;
    $config = include('Core/config.php');

    $url = empty($_GET['url']) ? '' : $_GET['url'];

    $router = new Router($url, $_SERVER['REQUEST_METHOD']);
    
    $router->addRoute('/', 'Home', 'index');
    $router->addRoute('/products', 'Products', 'index');
    $router->addRoute('/products/([0-9]+)', 'Products', 'details');
    $router->addRoute('/products/create', 'Products', 'create');
    $router->addRoute('/products/delete/([0-9]+)', 'Products', 'delete');

    View::render('header.php');

    $router->handleRequest();

    View::render('footer.php');
?>