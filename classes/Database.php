<?php

class Database
{
    public $db;

    public function __construct()
    {
        $dsn = 'mysql:dbname='.DB_NAME.';host=localhost';
        $user = 'woolfy';
        $user = DB_USER;
        $password = DB_PASS;
        try {
            $this->db = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}