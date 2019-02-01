<?php
namespace Core;

class View {
    public static function render($view, $args = null) {
        $file = dirname(__DIR__) . '/App/Views/' . $view;

        if (file_exists($file)) {
            require_once $file;
        } else {
            echo "A nézet nem található: $view";
        }
    }
}