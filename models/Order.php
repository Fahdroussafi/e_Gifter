<?php
class Order

{
    // function that get all the orders in the frontend in the orders page
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM orders');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    // function that create the order after its confirmed
    static public function createOrder($data)
    {

        $code = self::selectCodes($data["price_id"]);

        $stmt = DB::connect()->prepare('INSERT INTO orders (fullname,product,qte,price,total,code_id,user_id) VALUES (:fullname,:product,:qte,:price,:total,:code,:user_id)');
        $stmt->bindParam(':fullname', $data['fullname']);
        $stmt->bindParam(':product', $data['product']);
        $stmt->bindParam(':qte', $data['qte']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':total', $data['total']);
        $stmt->bindParam(':code', $code); // $code is the random code generated
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->execute();

        $stmt = DB::connect()->prepare('UPDATE prices SET quantity = quantity - :quantity WHERE price_id = :price_id');
        $stmt->bindParam(':quantity', $data['qte']);
        $stmt->bindParam(':price_id', $data['price_id']);
        $stmt->execute();
        return 'ok';
    }



    // function that get the random code for the order
    static public function selectCodes($price_id)
    {
        $code = self::gen_uid(6);
        $stmt = DB::connect()->prepare('INSERT INTO codes (code,price_id) VALUES (:code,:price_id)');
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':price_id', $price_id);
        $stmt->execute();
        $stmt = DB::connect()->prepare('SELECT code_id FROM codes WHERE code = :code');
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ)[0];
        return $result->code_id;
    }
    static public function gen_uid($l = 15)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, $l);
    }

    // function that get the order details for each user
    static public function getUserOrders($user_id)
    {
        $stmt = DB::connect()->prepare("SELECT users.user_id,orders.*,codes.code FROM users JOIN orders ON orders.user_id = users.user_id JOIN codes ON codes.code_id = orders.code_id WHERE users.user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // function that get that displays all orders in the admin dashboard
    static public function displayOrders() {
        $stmt = DB::connect()->prepare('SELECT * FROM orders ORDER BY done_at DESC');
        $stmt->execute();
        $orders = $stmt->fetchAll();
        return $orders;
        $stmt = null;
    }
}
