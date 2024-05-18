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
<<<<<<< HEAD
=======

>>>>>>> 5b14206c4ab872cf32dd2bf641588829944cb019
}