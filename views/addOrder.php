<?php
$order = new OrdersController();

foreach ($_SESSION as $name => $product) {
    if (substr($name, 0, 9) == "products_") {
        $data = array(
            "fullname" => $_SESSION["fullname"],
            "product" => $product["title"],
            "qte" => $product["qte"],
            "price" => $product["selectedPrice"],
            "price_id" => $product["price_id"],
            // "user_id" => $_SESSION["user_id"],
            "total" => $product["total"]
            
        );

        $order->addOrder($data);
    } else {
        // Redirect::to("cart");
        // echo '<pre>';
        // print_r($_SESSION);
        // echo '</pre>';
    }
}