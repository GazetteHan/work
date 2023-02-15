<?php
class Connection{
    public static function Make(){
        $pdo = new PDO("mysql:host=localhost;dbname=app3;", "root", "");
        return $pdo;
    }
}