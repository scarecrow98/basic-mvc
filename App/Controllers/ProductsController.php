<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Product;
use \App\Controllers\ErrorController;

class ProductsController extends \Core\Controller {
    public function __construct() { }

    public function index() {
        $products = Product::all();

        View::render('Products/index.php', [
            'products'  => $products
        ]);
    }

    public function details($id) {

        $product = Product::byID($id);

        View::render('Products/details.php', [
            'product'   => $product
        ]);
    }

    public function create() {
        Product::save();

        View::renderHTML('<h1>Az új termék létrehozva!</h1>');
    }

    public function delete($id) {
        Product::delete($id);

        View::renderHTML('<h1>Termék törölve!</h1>');
    }

}