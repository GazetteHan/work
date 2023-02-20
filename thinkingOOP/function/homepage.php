<?php

include "../function.php";

$db = include_once "../database/start.php";
$posts = $db->getAll("posts");

include "../index_view.php";