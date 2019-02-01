<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Project;

class ProjectsController extends \Core\Controller {
    public function __construct() { }

    public function index() {
        $projects = Project::all();

        View::render('Projects/index.php', [
            'projects'  => $projects
        ]);
    }

    public function details($id) {
        if (!$this->validateID($id)) return;

        $project = Project::byID($id);

        View::render('Projects/details.php', [
            'project'   => $project
        ]);
    }

    public function create() {
        View::render('Projects/create.php');
    }

    public function post_create($data) {
        Project::create($data);
        header('Location: ' . $_SERVER['REQUEST_URI']);
    }

    private function validateID($id) {
        if (!$id || !is_numeric($id)) {
            echo 'Helytelen ID!';
            return false;
        }

        return true;
    }
}