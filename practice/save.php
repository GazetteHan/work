<?php

    $pdo = new PDO('mysql:host=localhost;dbname=fuma;','root','');
    $sql = "SELECT * FROM main WHERE 1";
    $statement = $pdo->prepare($sql);
    $task = $statement->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['user'] = [$task[0]['heading'],$task[0]['heading']];
    var_dump($_SESSION['user']);