<?php
    use \Core\Router;
    use \Core\View;
    require_once 'Core/autoload.php';

    $url = empty($_GET['url']) ? '' : $_GET['url'];

    $router = new Router($url, $_SERVER['REQUEST_METHOD']);
    
    $router->addRoute('/', 'Home', 'fuck');
    $router->addRoute('/projects', 'Projects', 'index');
    $router->addRoute('/projects/create', 'Projects', 'create');
    $router->addRoute('/projects/details/([0-9]+)', 'Projects', 'details');

    View::render('header.php');

    $router->handleRequest();

    View::render('footer.php');
?>