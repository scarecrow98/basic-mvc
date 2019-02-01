<?php

namespace App\Controllers;

use \Core\View;

class HomeController extends \Core\Controller {
    public function __construct() { }

    public function index() {
        View::render('Home/index.php');
    }

    public function fuck() {
        echo 'asd';
    }
}