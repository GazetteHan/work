<?php
//var_dump($_POST);

include ('function.php');
$db = include('database/start.php');

$db->create("posts",[
    "title"=>$_POST["title"],
]);

header("Location: main.php");