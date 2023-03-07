<?php

include "thinkingOOP/function.php";

$db = include_once "thinkingOOP/database/start.php";
$posts = $db->getAll("posts");

include "thinkingOOP/index_view.php";