<?php
require '../DeepOOP/vendor/autoload.php';
require "app/QueryBuilder.php";


use App\QueryBuilder;


$db = new QueryBuilder();
$result = $db->getAll('posts');
var_dump($result);
