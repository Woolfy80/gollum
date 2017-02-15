<?php

class Database
{
    private $db;

    public function __construct()
    {
        $dsn = 'mysql:dbname=testdb;host=127.0.0.1';
        $user = 'root';
        $password = '111';
        try {
            $this->db = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

        // Select target database
        mysql_select_db($this->database, $this->connection)
        or die(mysql_error());

    }
}