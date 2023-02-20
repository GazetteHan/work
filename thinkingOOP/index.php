<?php
include "function.php";
$db = include "database/start.php";

$posts = $db->getAll("posts");
include "index_view.php";
?>

