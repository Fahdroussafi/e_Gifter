<?php
session_start();

require_once("./bootstrap.php");

spl_autoload_register('autoload'); // autoload function to load classes automatically

function autoload($class_name){
    $array_path = array(
        'database/',
        'app/classes/',
        'models/',
        'controllers/'
    );
    $parts = explode('\\',$class_name); // split the class name by '\' to get the path of the class
    $name = array_pop($parts); // get the last part of the class name
    
    foreach($array_path as $path){
        $file = sprintf($path.'%s.php',$name); // create the file path to load the class
        if(is_file($file)){
            include_once $file;
        }
    }
}