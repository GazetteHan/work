<?php
class Connection{
    public static function Make($config){
//        var_dump($config);
        return new PDO("{$config['connection_db']};{$config ['dbname']};",$config['username'], $config['password']);
    }
}