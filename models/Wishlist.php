<?php
class Wishlist
{

    static public function getAll($user)
    {
        $stmt = DB::connect()->prepare('SELECT * FROM wishlist WHERE user_id = :user');
        $stmt->execute(array(":user" => $user));
        return $stmt->fetchAll(); // returns an array of arrays
        $stmt->close(); // close the statement
        $stmt = null; // close connection
    }

    static public function like($data){
        // echo "<pre>";
        // print_r($data);
        // die;
        $stmt = DB::connect()->prepare("INSERT INTO wishlist (user_id, product_id) VALUES (:user, :product)");
        $stmt->bindParam(":user", $data['user_id']);
        $stmt->bindParam(":product", $data['product_id']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }
    static public function unlike($user, $id)
    {
        $stmt = DB::connect()->prepare('DELETE FROM wishlist WHERE user_id = :user AND product_id = :id');
        $stmt->execute(array(":user" => $user, ":id" => $id));
        $stmt->close(); // close the statement
        $stmt = null; // close connection
    }
}
