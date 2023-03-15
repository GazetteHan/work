<?php

namespace App;
class QueryBuilder{
    public function getAll(){
        $queryFactory = new QueryFactory('mysql');

            //var_dump($queryFactory);

        $select = $queryFactory->newSelect();
        $select->cols(['*'])->from('post');

            //var_dump($select->getStatement());
        $pdo = new PDO("mysql:host=localhost;dbname=app3", "root", "");
        $sth = $pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $result = $sth->fetch(PDO::FETCH_ASSOC);

        var_dump($result);
        echo 123;
    }


}

