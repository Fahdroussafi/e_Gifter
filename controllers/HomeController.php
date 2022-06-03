<?php

class HomeController{
    public function index($page){

        if (isset($_SESSION["admin"]) == true && $_SESSION["admin"] == true) {
            Redirect::to ("dashboard");
        } 
        include('views/'.$page.'.php');
    }
}