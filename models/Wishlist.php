<?php
class Wishlist
{

    static public function getAll()
    {
        // $stmt = DB::connect()->prepare('SELECT * FROM wishlist WHERE user_id = :id');        
        $stmt = DB::connect()->prepare('SELECT * FROM wishlist JOIN products JOIN categories on products.product_id = wishlist.product_id and categories.cat_id = products.product_category_id WHERE user_id = :id;');
        $stmt->execute(array(":id" => $_SESSION["user_id"]));
        return $stmt->fetchAll(); // returns an array of arrays
        // $stmt->close(); // close the statement
        $stmt = null; // close connection
    }

    static public function add($data)
    { {
            $stmt = DB::connect()->prepare('SELECT * FROM wishlist WHERE user_id = :user AND product_id = :product');
            $stmt->execute(array(":user" => $data["user_id"], ":product" => $data["product_id"]));
            $result = $stmt->fetchAll();
            if (count($result) > 0) {
                // return "Product is already in your wishlist";
            } else {
                $stmt = DB::connect()->prepare('INSERT INTO wishlist (user_id, product_id) VALUES (:user, :product)');
                $stmt->execute(array(":user" => $data["user_id"], ":product" => $data["product_id"]));
                return "ok";
            }
        }
    }

    static public function remove($product_id)
    {
        $stmt = DB::connect()->prepare("DELETE FROM wishlist WHERE product_id = :product");
        $stmt->execute(array(":product" => $product_id));
        return "ok";
    }
}
