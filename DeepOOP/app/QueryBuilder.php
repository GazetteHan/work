<?php

namespace App;

use Aura\SqlQuery\QueryFactory;

use PDO;

class QueryBuilder{

    private $pdo;
    private $queryFactory;
    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=app3", "root", "");
        $this->queryFactory = new QueryFactory('mysql');
}
    public function getAll($table){
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])->from($table);

            var_dump($select->getStatement());

        $sql = $select->getStatement();
        $sth = $this->pdo->prepare($sql);
        $sth->execute($select->getBindValues());
        $result = $sth->fetch(PDO::FETCH_ASSOC);

        public function insert($data, $table){
            $insert = $this->queryFactory->newInsert();
            $insert->into($table)->cols($data);

            $sth = $this->pdo->prepare($insert->getStatement());
            $sth->execute($insert->getBindValues());
        }


        var_dump($result);
        echo 123;
    }


}

