<?php
include "function.php";
$db = include "DataBase/start.php";
$posts = $db->getAllPosts("posts");


include "index_view.php";

