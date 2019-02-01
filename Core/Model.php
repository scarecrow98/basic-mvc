<?php

namespace Core;

use PDO;

class Model {
    protected static $instance = null; 

    private function __construct() {  }
    private function __clone() {  }

    protected static function connect() {
        if (!self::$instance) {
            self::$instance = new PDO('mysql:host=localhost;dbname=cms', 'root', '', array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8 COLLATE utf8_hungarian_ci',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ));
        }

        return self::$instance;
    }
}