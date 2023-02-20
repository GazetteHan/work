<?php
$config = include "config.php";
include "database/Connection.php";
include "database/queryBuilder.php";


$result = new QueryBuilder(Connection::make($config["database"]));
return $result;