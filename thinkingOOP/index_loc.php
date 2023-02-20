<?php
include "function.php";
include "index_view.php";
$db = include "database/start.php";
$posts = $db->getAll("posts");




?>