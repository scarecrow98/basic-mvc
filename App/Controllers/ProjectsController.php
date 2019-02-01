<?php

namespace App\Controllers;

use \Core\View;

class ProjectsController extends \Core\Controller {
    public function __construct() {

    }

    public function index() {
        View::render('Projects/index.php', [
            'szam'  => 3
        ]);
    }

    public function details($id) {
        if (!$this->validateID($id)) return;
        View::render('Projects/details.php', [
            'title' => 'Teszt projekt',
            'desc'  => 'Ez egy teszt projekt'
        ]);
    }

    public function edit($id) {
        if (!$this->validateID($id)) return;

        echo "A $id-as számú projekt szerkesztése.";
    }

    private function validateID($id) {
        if (!$id || !is_numeric($id)) {
            echo 'Helytelen ID!';
            return false;
        }

        return true;
    }
}