<?php
include "function.php";
$db = include "database/start.php";
$id = $_GET["id"];
$post = $db->update("posts",$_POST, $id);

header("Location: main.php");
?>