<?php

$image = $_FILES['image'];
$title = $_POST['title'];
$price = $_POST['price'];
$type = $_POST['type'];

//var_dump($image['name']);
//exit();

$pdo = new PDO("mysql:host=localhost;dbname=shop;","root","");

$sql = "INSERT INTO cards (image, title, price, type) VALUES (:image, :title, :price, :type)";
$statement = $pdo->prepare($sql);
$statement->execute(["image" => $image['name'], "title" => $title, "price" => $price, "type" => $type]);

header("Location: add.php");