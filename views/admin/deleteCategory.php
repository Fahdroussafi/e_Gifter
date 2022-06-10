<?php
if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true){
    $data = new AdminController();
    $data->removeCategory();
}else{
    Redirect::to("home");
}
