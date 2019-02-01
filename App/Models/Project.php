<?php

namespace App\Models;

use PDO;

class Project extends \Core\Model {

    public $ID;
    public $title;
    public $description;
    public $deadline;

    public static function all() {
        return self::connect()
            ->query('SELECT * FROM projects')
            ->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public static function byID($id) {
        return self::connect()
            ->query("SELECT * FROM projects WHERE ID = $id")
            ->fetchObject(__CLASS__);
    }

    public static function create($data) {
        self::connect()
            ->prepare("INSERT INTO projects(title, description, deadline) VALUES(?, ?, ?)")
            ->execute([
                $data['title'],
                $data['description'],
                $data['deadline']
            ]);
    }
}