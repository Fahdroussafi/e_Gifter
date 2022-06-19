<?php
foreach($_SESSION as $name => $product){ // foreach loop to get all products in cart
    if(substr($name,0,9) == "products_"){ // if the name of the product starts with "products_"
        unset($_SESSION[$name]); // unset the product from the cart session
        unset($_SESSION["count"]);
        unset($_SESSION["totaux"]);
        Redirect::to("cart");
    }
}
