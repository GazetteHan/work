<?php
session_start();
$text = $_POST["text"];

$pdo = new PDO("mysql:host=localhost;dbname=my_project;", "root","");
$sql = "INSERT INTO my_table (text) VALUES (:text)";

$statement = $pdo->prepare($sql);
$statement->execute(["text" => $text]);

$message = $text;
$_SESSION['success'] = $message;
var_dump($_SESSION);

/header("location: /20tasks/task_10.php");