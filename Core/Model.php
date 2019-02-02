<?php

namespace Core;

use PDO;
use \Core\QueryBuilder;

class Model {
    protected static $instance = null; 
    protected static $query_builder = null;

    private function __construct() {  }
    private function __clone() {  }

    protected static function connect() {
        if (!self::$instance) {
            self::$instance = new PDO("mysql:host=localhost;dbname=cms", 'root', '', array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8 COLLATE utf8_hungarian_ci',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ));
        }

        return self::$instance;
    }

    protected static function queryBuilder() {
        if (!self::$query_builder) {
            self::$query_builder = new QueryBuilder(self::connect());
        }

        return self::$query_builder;
    }
}