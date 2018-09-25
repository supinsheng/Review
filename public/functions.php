<?php

function view($fileName,$data=[]){

    extract($data);
    $fileName = str_replace('.','/',$fileName);
    
    require(ROOT.'views/'.$fileName.".html");
}