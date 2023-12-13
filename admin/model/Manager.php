<?php

namespace MyShop\Admin\Model;

define("DB_HOST", "localhost");
define("DB_USERNAME", "oazzis");
define("DB_PASSWORD", "Joydzx9y*.*");
define("DB_PORT", "3306");
define("DB_NAME", "my_shop");

class Manager
{
    protected function dbConnect()
    {
        $sql = 'mysql:host=' . DB_HOST . ':' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8';
        return new \PDO($sql, DB_USERNAME, DB_PASSWORD);
    }
}