<?php
if (isset($_POST["product_id"])) {
    $id = $_POST["product_id"];
    $price_id = $_POST["price_id"];
    $qte = $_POST["product_qte"];
    $title = $_POST["product_title"];
    $selectedPrice = $_POST["selectedPrice"];


    $data = new ProductsController();
    $product = $data->getProduct();
    // $price = $data->getValue();

    // echo '<pre>';
    // print_r($selectedPrice);
    // exit;
    // $data->decreaseProductquantity();


    if ($_SESSION["products_" . $id]["title"] == $_POST["product_title"]) {
        Session::set("info", "You already added this product to your cart!");
        Redirect::to("cart");
    } else {
        // if ($product->product_quantity < $_POST["product_qte"]) {
        //     Session::set("info", "The Available Quantity is : $product->product_quantity");
        //     Redirect::to("cart");
        
            $_SESSION["products_" . $product->product_id] = array(
                "id" => $id,
                "title" => $title,
                "price_id" => $price_id,
                "selectedPrice" => $selectedPrice,
                "qte" => $qte,
                "total" => $selectedPrice * $_POST["product_qte"],
            );
            $_SESSION["totaux"] += $_SESSION["products_" . $product->product_id]["total"];
            // show number of products in cart
            // $_SESSION["count"] = count($_SESSION);
            $_SESSION["count"] += 1;
            Redirect::to("cart");
    }
} else {
    Redirect::to("cart");
}
