<?php
if (isset($_POST["product_id"])) {
    $id = $_POST["product_id"];

    $data = new ProductsController();
    $product = $data->getProduct();
    $price = $data->getValue();
    // decrement product quantity
    $data->decreaseProductquantity();


    if ($_SESSION["products_" . $id]["title"] == $_POST["product_title"]) {
        Session::set("info", "Vous avez déja ajouté ce produit au panier");
        Redirect::to("cart");
    } else {
        if ($product->product_quantity < $_POST["product_qte"]) {
            Session::set("info", "La quantité disponible est : $product->product_quantity");
            Redirect::to("cart");
        } else {
            $_SESSION["products_" . $product->product_id] = array(
                "id" => $product->product_id,
                "title" => $product->product_title,
                "price" => $_POST["product_price"],
                "qte" => $_POST["product_qte"],
                "total" => $_POST["product_price"] * $_POST["product_qte"],
            );
            $_SESSION["totaux"] += $_SESSION["products_" . $product->product_id]["total"];
            // show number of products in cart
            // $_SESSION["count"] = count($_SESSION);
            $_SESSION["count"] += 1;
            Redirect::to("cart");
        }
    }
} else {
    Redirect::to("cart");
}

