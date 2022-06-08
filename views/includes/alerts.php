<?php

if(isset($_COOKIE["success"])){
    echo "<div class='flex justify-center w-auto px-64 mx-64 alert alert-success shadow-lg font-bold'>".$_COOKIE["success"]."</div>";
}

if(isset($_COOKIE["error"])){
    echo "<div class='flex justify-center w-auto px-64 mx-64 alert alert-error shadow-lg font-bold'>".$_COOKIE["error"]."</div>";
}

if(isset($_COOKIE["info"])){
    echo "<div class='flex justify-center w-auto px-64 mx-64 alert alert-info shadow-lg font-bold >".$_COOKIE["info"]."</div>";
}

