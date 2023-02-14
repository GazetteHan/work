<?php

$text = $_POST["text"];

$pdo = new PDO("mysql:host=localhost;dbname=my_project;", "root", "");

$sql = "SELECT * FROM my_table (text) WHERE text=:text";
$statement = $pdo->prepare($sql);
$statement->execute(["text" => $text]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

var_dump($task);die;

$sql = "INSERT INTO my_table (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(["text" => $text]);

/header("location: /20tasks/task_10.php");

