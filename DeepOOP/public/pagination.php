<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pagination</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>


<?php require_once "../vendor/autoload.php";

use App\QueryBuilder;
use Aura\SqlQuery\QueryFactory;
use JasonGrimes\Paginator;

$db = new QueryBuilder();
$pdo = $db->pdo;


$queryFactory = new QueryFactory('mysql');
$select = $queryFactory->newSelect();
$select->cols(['*'])->from('posts');

$sth = $pdo->prepare($select->getStatement());
$sth->execute($select->getBindValues());
$totalItems = $sth->fetchAll(PDO::FETCH_ASSOC);
//var_dump($totalItems);

//-----------

$countElements = 10;

$select = $queryFactory->newSelect();
$select->cols(['*'])
	->from('posts')
	->setPaging($countElements)
	->page($_GET['page'] ?? 1);
$sth = $pdo->prepare($select->getStatement());
$sth->execute($select->getBindValues());
$items = $sth->fetchAll(PDO::FETCH_ASSOC);

$itemsPerPage = $countElements;
$currentPage = $_GET['page'] ?? 1;
$urlPattern = '?page=(:num)';

$paginator = new Paginator(count($totalItems), $itemsPerPage, $currentPage, $urlPattern);

//var_dump($items);
echo "<br>";
foreach ($items as $item) {
	echo $item['id'] . PHP_EOL . $item['title'] . "<br>";
}

include '../vendor/jasongrimes/paginator/examples/pager.phtml';

?>
<style>
	.pagination{
        display: flex;
		gap: 10px;
	}
	.active{
        font-weight: bold;
	}
</style>
<hr>
<p>footer</p>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>