<?php

namespace App\Models;

use PDO;

class Product extends \Core\Model {
    public $ID;
    public $name;
    public $description;
    public $stock;
    public $price;
    public $image;

    public static function byID($id) {
        return self::queryBuilder()->select('products', '*')
                ->where("ID = $id")
                ->map('\App\Models\Product')
                ->execute()
                ->getSingle();
    }

    public static function all() {
        return self::queryBuilder()->select('products', '*')
                ->map('\App\Models\Product')
                ->execute()
                ->getCollection();
    }

    public static function save() {
        self::queryBuilder()->insert('products', ['name', 'description', 'price'], ['egy kis az', 'asdas', 400])
                ->execute();
    }

    public static function delete($id) {
        self::queryBuilder()->delete('products')
                ->where("ID = $id")
                ->execute();
    }
}