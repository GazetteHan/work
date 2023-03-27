<?php
require_once "vendor/autoload.php";

echo 'index';

$templates = new \League\Plates\Engine('app/view');

echo $templates->render('homepage', ['name' => 'QWE']);