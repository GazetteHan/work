<?php
require_once '../vendor/autoload.php';

use Aura\SqlQuery\QueryFactory;
use JasonGrimes\Paginator;
use Faker\Factory;


$faker = Faker\Factory::create();


$pdo = new PDO("mysql:host=localhost;dbname=app3;", "root", "");
$queryFactory = new QueryFactory('mysql');

$insert = $queryFactory->newInsert();

echo $title = $faker->jobTitle();
echo $content = $faker->text();

$insert->into('posts');
for ($i = 0; $i < 30; $i++){
    $insert->cols([
        'title' => $title,
        'content' => $content,
    ]);
    $insert->addRow();
}

$sth = $pdo->prepare($insert->getStatement());
$sth->execute($insert->getBindValues());

