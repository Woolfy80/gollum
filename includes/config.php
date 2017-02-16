<?php
ob_start();
session_start();

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "111");
define("DB_NAME", "blog");

function __autoload($class) {

    $classpath = 'classes/'. $class . '.php';
    if ( file_exists($classpath)) {
        require_once $classpath;
    }

    $classpath = '../classes/' . $class . '.php';
    if ( file_exists($classpath)) {
        require_once $classpath;
    }
}

function tag($name, $src, $ending=true) {
    return "<$name>$src" . ($ending ? "</$name>" : "");
}

$db = new Database();


