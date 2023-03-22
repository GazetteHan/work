<?php


namespace App\controllers;

use App\QueryBuilder;



class HomeController{
    public function index($vars){
        d($vars);

        $db = new QueryBuilder();


        $result = $db->getAll('posts');

        //var_dump($result);
        $db->update([
            'title' => 'test update',],9,'posts');

        echo 'homepage';
    }



}

