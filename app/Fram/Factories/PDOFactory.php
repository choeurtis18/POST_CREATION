<?php

namespace App\Fram\Factories;

class PDOFactory
{
    public static function getMysqlConnection()
    {
        // TODO - Get PDO
        $db = new PDOFactory("mysql:host=db;dbname=post_project_db", "root", "root");
        return $db;
    }
}