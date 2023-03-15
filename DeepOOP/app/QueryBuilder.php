<?php

namespace App;

use Aura\SqlQuery\QueryFactory;

use PDO;
class QueryBuilder{
    public function getAll(){
        $queryFactory = new QueryFactory('mysql');

            //var_dump($queryFactory);

        $select = $queryFactory->newSelect();
        $select->cols(['*'])->from('posts');

            //var_dump($select->getStatement());
        $pdo = new PDO("mysql:host=localhost;dbname=app3", "root", "");
        $sth = $pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $result = $sth->fetch(PDO::FETCH_ASSOC);

        var_dump($result);
        echo 123;
    }


}

