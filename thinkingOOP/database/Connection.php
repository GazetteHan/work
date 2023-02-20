<?php

class Connection
{
    public static function make($config)
    {
        $connectionDB = "{$config['connection_db']};dbname={$config['dbname']};";
        $login = $config['username'];
        $password = $config['password'];

        return new PDO(
            $connectionDB,
            $login,
            $password);
    }
}