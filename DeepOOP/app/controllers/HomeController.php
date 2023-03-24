<?php


namespace App\controllers;

use App\QueryBuilder;
use League\Plates\Engine;


class HomeController{

    private $templates;

    public function __construct()
    {
        $this->templates = new Engine('../app/view');
    }

    public function index($vars){

        $db = new QueryBuilder();

        $posts = $db->getALL('posts');
        echo $this->templates->render('homepage', ['postsInView' => $posts]);


// Render a template
//        echo $this->templates->render('about', ['name' => 'zxcursed']);
    }
    public function about($vars){

        echo $this->templates->render('about', ['name'=> 'zxc about page']);
    }


}

