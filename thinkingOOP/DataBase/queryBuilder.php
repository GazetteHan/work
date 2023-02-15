<?php

class queryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    function getAllPosts()
    {
        $statement = $this->pdo->prepare("SELECT * FROM `posts`");
        $statement->execute(); //ПОЛУЧИТЬ РЕЗУЛЬТАТ
        dd($statement->fetchAll(PDO::FETCH_ASSOC)); //ПЕРЕДАЕМ ДАННЫЕ В ПЕРЕМЕННУЮ USER
        return $posts;
    }
}

;