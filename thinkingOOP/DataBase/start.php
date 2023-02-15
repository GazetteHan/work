<?php
$config = include "config.php";
include "DataBase/queryBuilder.php";
include "DataBase/make.php";
//dd($config['database']);
return new queryBuilder(Connection::Make($config['database']));

//$pdo = Connection::Make();
//$db = new queryBuilder($pdo);

//dd($posts);