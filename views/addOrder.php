<?php
$order = new OrdersController();

foreach ($_SESSION as $name => $product) {
    
    if (str_starts_with($name,"products_")) {

    for ($i=0; $i < $product["qte"]; $i++) { 
        $data = array(
            "fullname" => $_SESSION["fullname"],
            "product" => $product["title"],
            "qte" => 1,
            "price" => $product["selectedPrice"],
            "price_id" => $product["price_id"],
            // "user_id" => $_SESSION["user_id"],
            "total" => $product["total"],
            "name" => $name
            
        );

        $order->addOrder($data);
    }
        
    } 
}
Session::set("success", "order went successfully");
Redirect::to("userorders");