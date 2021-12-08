<?php

namespace App\Fram\Factories;

class PDOFactory
{
    public static function getMysqlConnection()
    {
        try {
            $db = new \PDO("mysql:host=db;dbname=post_project_db", "root", "root");
            return $db;
        } catch (\Exception $e) {
            die('Erreur : '.$e->getMessage());
            return "error";
        }
    }
}