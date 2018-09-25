<?php

define('ROOT',__DIR__."/../");
require ROOT.'vendor/autoload.php';
require(ROOT.'public/functions.php');

if(isset($_SERVER['PATH_INFO'])){

    $data = explode('/',$_SERVER['PATH_INFO']);
    
    $controller = ucfirst($data[1]).'Controller';

    if(isset($data[2])){
        $action = $data[2];
    }else {
        $action = 'index';
    }
    
}else {
    $controller = "IndexController";
    $action = 'index';
}

function autoload($class){

    $class = str_replace('\\','/',$class);
    require(ROOT.$class.".php");
}

spl_autoload_register('autoload');

$controller = 'controllers\\'.$controller;

$c = new $controller;
$c->$action();
