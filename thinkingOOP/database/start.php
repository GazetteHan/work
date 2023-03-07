<?php
$config = include "thinkingOOP/config.php";
include "thinkingOOP/database/Connection.php";
include "thinkingOOP/database/queryBuilder.php";


$result = new QueryBuilder(Connection::make($config["database"]));
return $result;