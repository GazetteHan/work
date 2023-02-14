<?php

$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO('mysql:host=localhost;dbname=my_project','root','');

$sql ="SELECT * FROM products WHERE email=:email";
$statement = $pdo-> prepare($sql);
$statement->execute(['email' => $email]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

if (empty($user)) {
    echo "Пользователь с таким эл. адресом уже существует.";
    exit;
};

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO products (email, password) VALUES (:email, :password)";
$statement = $pdo->prepare($sql);