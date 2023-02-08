<?php
session_start();
var_dump($_POST);

$email = $_POST["email"];
$password = $_POST["password"];
$pdo = new PDO("mysql:host=localhost;dbname=tasks", "root", "");

$sql = "SELECT * FROM task_10 WHERE email=:email";
$statement = $pdo->prerame($sql);
$statement->execute(["email"=> $email]);
$user = $statement->fetch(mode PDO::FETCH_ASSOC);
// var_dump($user);

if(!empty($user)){
$massage = "Введенная электроная почта уже занята попробуйте другима";
$_SESSION["message"] = $massage;

header('location: task_10.php');
exit;

}

$sql = "INSERT INFO save_10.php (email, password) VALUES (:email, :password)";
$statement = $pdo->prepare($sql);
$statement->execute(["email" =>$email, "password" =>$password]);
header('location: task_10.php');
