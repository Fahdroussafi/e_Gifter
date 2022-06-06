<?php

if(isset($_COOKIE["success"])){
    echo "<div class='w-auto px-10 mx-10 alert alert-success shadow-lg justify-center font-bold'>".$_COOKIE["success"]."</div>";
}

if(isset($_COOKIE["error"])){
    echo "<div class='w-auto px-10 mx-10 alert alert-error shadow-lg justify-center font-bold'>".$_COOKIE["error"]."</div>";
}

if(isset($_COOKIE["info"])){
    echo "<div class='w-auto px-10 mx-10 alert alert-info shadow-lg justify-center font-bold >".$_COOKIE["info"]."</div>";
}
