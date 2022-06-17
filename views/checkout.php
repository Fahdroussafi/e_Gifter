<?php
if (isset($_POST["product_id"])) {
    $id = $_POST["product_id"];
    $price_id = $_POST["price_id"];
    $qte = $_POST["product_qte"];
    $title = $_POST["product_title"];
    $selectedPrice = $_POST["selectedPrice"];


    $data = new ProductsController();
    $product = $data->getProduct();

    if ($_SESSION["products_" . $id]["title"] == $_POST["product_title"]) {
        Session::set("error", "Product already added to cart");
        Redirect::to("productslist");
    } else {
       
            $_SESSION["products_" . $product->product_id] = array(
                "id" => $id,
                "title" => $title,
                "price_id" => $price_id,
                "selectedPrice" => $selectedPrice,
                "qte" => $qte,
                "total" => $selectedPrice * $_POST["product_qte"],
            );
            $_SESSION["totaux"] += $_SESSION["products_" . $product->product_id]["total"];
            $_SESSION["count"] += 1;
            Session::set("success", "Product added to cart successfully");
            Redirect::to("productslist");
    }
} else {
    Redirect::to("cart");
}
