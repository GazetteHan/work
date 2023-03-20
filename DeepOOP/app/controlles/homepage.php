<?php

use App\QueryBuilder;

$db = new QueryBuilder();

echo "<pre>";
var_dump($db->getAll('posts'));

$data = [
//	"id"    => 36,
    "title" => "Новый заголовок update " . date('U')
];

$db->update($data, 36, 'posts');

//$db->insert($data, 'posts');

echo "<hr>";
echo "<hr>";