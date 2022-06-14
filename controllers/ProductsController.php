<?php

class ProductsController
{
    public function getAllProducts()
    {
        $products = Product::getAll(); 
        return $products;
    }
    public function getRandomProducts()
    {
        $products = Product::getRandom(5);
        return $products;
    }
    public function getProductsByCategory($id)
    {
        if (isset($id)) {
            $data = array(
                'id' => $id
            );
            $products = Product::getProductByCat($data);
            return $products;
        }
    }
    public function getProduct()
    {
        if (isset($_POST["product_id"])) {
            $data = array(
                'id' => $_POST["product_id"]

            );
            $product = Product::getProductById($data);
            return $product;
        }
    }

    public function getValue()
    {
        if ($_POST["product_id"]) {
            $value = Product::getValues($_POST["product_id"]);
            return $value;
        }
    }

    public function getPricesValue()
    {
        $prices = Product::getPrices();
        return $prices;
    }

    public function emptyCart($id, $price)
    {
        unset($_SESSION["products_" . $id]);
        $_SESSION["count"] -= 1;
        $_SESSION["totaux"] -= $price;
        Redirect::to("cart");
    }
}
