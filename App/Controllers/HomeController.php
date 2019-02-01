<?php

namespace App\Controllers;

use \Core\View;

class HomeController extends \Core\Controller {
    public function __construct() {

    }

    public function index() {
        echo 'Ez az alap lista oldal.';
    }
}