<?php

$email = "test@email.ru";
$password = "secret";

$pdo = new PDO("mysql:host=localhost;dbname=my_project","root","");

$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";

$statement = $pdo->prepare($sql);
$statement->execute([
    "email" => $email,
    "password" => password_hash($password, PASSWORD_DEFAULT)
]);