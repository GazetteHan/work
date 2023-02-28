<?php

include_once "Config.php";
include_once "Database.php";

//Database::getInstance()->insert('users', [
//	'username' => 'Marlin',
//	'password' => 'pass',
//]);
//Database::getInstance()->update('users', 5, [
//	'username' => 'Marlin2',
//	'password' => 'pass2',
//]);

$GLOBALS["config"] = [
    'mysql' => [
        "host"      => "localhost",
        "username"  => "root",
        "password"  => "",
        "database"  => "marlin_cleanoop",
        "something" => [
            "no" => [
                "foo" => [
                    "bar" => "baz"
                ]
            ]
        ]
    ]
];


$users = Database::getInstance()->get('users', ['username', '=', 'Marlin']);
//Database::getInstance()->delete('users', ['username', '=', 'name2']);


if ($users->error()) {
    echo "This Error";
} else {
    foreach ($users->result() as $user) {
        echo $user["id"] . ". " . $user["username"] . "<br>";
        //		echo $user . "<br>";
    }
}