<?php
class Wishlist
{

    static public function getAll()
    {
        // $stmt = DB::connect()->prepare('SELECT * FROM wishlist WHERE user_id = :id');        
        $stmt = DB::connect()->prepare('SELECT * FROM wishlist JOIN products on products.product_id = wishlist.product_id WHERE user_id = :id');
        $stmt->execute(array(":id" => $_SESSION["user_id"]));
        return $stmt->fetchAll(); // returns an array of arrays
        // $stmt->close(); // close the statement
        $stmt = null; // close connection
    }

    static public function add($data)
    {
        {
            // if product is already in wishlist then alert user
            $stmt = DB::connect()->prepare('SELECT * FROM wishlist WHERE user_id = :user AND product_id = :product');
            $stmt->execute(array(":user" => $data["user_id"], ":product" => $data["product_id"]));
            $result = $stmt->fetchAll();
            if (count($result) > 0) {
                return "Produit déjà dans la wishlist";
            } else {
                $stmt = DB::connect()->prepare('INSERT INTO wishlist (user_id, product_id) VALUES (:user, :product)');
                $stmt->execute(array(":user" => $data["user_id"], ":product" => $data["product_id"]));
                return "ok";
            }
           
            
        //     $stmt = DB::connect()->prepare('INSERT INTO wishlist (user_id, product_id) VALUES (:user_id, :product_id)');
        //     $stmt->bindParam(':user_id', $data['user_id']);
        //     $stmt->bindParam(':product_id', $data['product_id']);
        //     $stmt->execute();
        //     return "ok";
        //     $stmt = null;
        // }
    }
    }

    static public function remove($user, $product_id)
    {
        $stmt = DB::connect()->prepare("DELETE FROM wishlist where product_id = " . $product_id . " AND user_id = " . $user . " ");
        $stmt->execute();
        $stmt = null; // close connection
    }
}
