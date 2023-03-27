<?php


namespace App\controllers;

use App\QueryBuilder;
//use http\Exception;
use League\Plates\Engine;
use function Tamtamchik\SimpleFlash\flash;

//use Tamtamchik\SimpleFlash\Flash;


class HomeController{

    private $templates;

    public function __construct()
    {
        $this->templates = new Engine('../app/view');
    }

    public function index($vars){

        $db = new QueryBuilder();

        $posts = $db->getALL('posts');
        echo $this->templates->render('homepage', ['postInView' => $posts]);


// Render a template
//        echo $this->templates->render('about', ['name' => 'zxcursed']);
    }
    public function about($vars){

        try {
            $this->withdraw($vars['amount']);
        }catch (\Exception $exception){
            flash()->error($exception->getMessage());


//            flash()->error($exception->getMessage());
        }


        echo $this->templates->render('about', ['name'=> 'zxc about page']);
    }
    public function withdraw($amount = 1){
        $total =10;

        if ($amount > $total) {
            throw new \Exception("Недостаточно средств");
        }
    }

}

