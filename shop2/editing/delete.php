<?php

$pdo = new PDO("mysql:host=localhost;dbname=shop;","root","");
$sql = "SELECT * FROM cards";
$statement = $pdo->prepare($sql);
$statement->execute();
$cards = $statement->fetchAll(PDO::FETCH_ASSOC);?>


    <link rel="stylesheet" href="style.css">
    <form action="delete_handler.php" method="post">
        <div class="cards">
            <label for="">название</label>
            <input name="title" type="text">
        </div>
        <div>
            <button class="btn btn-success" type="submit">Удалить</button>
        </div>
    </form>

