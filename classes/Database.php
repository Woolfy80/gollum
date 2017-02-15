<?php

class Database
{
    public $db;

    public function __construct()
    {
        $dsn = 'mysql:dbname=blog;host=localhost';
        $user = 'root';
        $password = '111';
        try {
            $this->db = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}