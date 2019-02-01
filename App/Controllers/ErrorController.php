<?php

namespace App\Controllers;

use \Core\View;

class ErrorController extends \Core\Controller {
    public function __construct() { }

    public static function err404($msg = null) {
        View::render('Error/404.php', ['msg' => $msg]);
    }

    public static function err403($msg = null) {
        View::render('Error/403.php', ['msg' => $msg]);
    }
}