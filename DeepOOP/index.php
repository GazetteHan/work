<?php
require_once "vendor/autoload.php";

if ($_SERVER['REQUEST_URI'] == '/php/marlin/deepOOP/public/home') {
    require 'app/controlles/homepage.php';
}

exit();