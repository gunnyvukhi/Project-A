<?php

class DB {
    private static $instance = NULL;

    private function __construct() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=localhost;dbname=database', 'root', 'root', $pdo_options);
        }
        return self::$instance;
    }
}

$demo = 1;
$demo = 2;
$demo = 3; 
echo $demo;
$demo = 4;
echo $demo;
/*
git add config/db.php
>> git commit -m "Your commit message"
>> git push origin main
*/
