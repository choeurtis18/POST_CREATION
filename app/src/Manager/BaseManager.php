<?php

namespace App\Manager;

abstract class BaseManager
{
    protected $db;

    public function __construct($pdo)
    {
        $this->db = $pdo;
    }
}