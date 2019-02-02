<?php
namespace Core;

use \App\Controllers\ErrorController;

class View {
    public static function render($view, $args = null) {
        $file = dirname(__DIR__) . '/App/Views/' . $view;

        if (file_exists($file)) {
            require_once $file;
        } else {
            ErrorController::err404('Nem található nézet.');
        }
    }

    public static function renderHTML($html_content) {
        echo $html_content;
    }
}