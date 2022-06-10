<?php
class Order

{
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM orders');
        $stmt->execute();
        return $stmt->fetchAll();
        // $stmt->close();
        $stmt = null;
    }

    static public function createOrder($data)
    {

        $code = self::selectCodes($data["price_id"]);
        // echo '<pre>';
        // var_dump($code);
        // echo '</pre>';
        // die();

        $stmt = DB::connect()->prepare('INSERT INTO orders (fullname,product,qte,price,total,code_id,user_id) VALUES (:fullname,:product,:qte,:price,:total,:code,:user_id)');
        $stmt->bindParam(':fullname', $data['fullname']);
        $stmt->bindParam(':product', $data['product']);
        $stmt->bindParam(':qte', $data['qte']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':total', $data['total']);
        $stmt->bindParam(':code', $code); // $code is the random code generated
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->execute();
        // if ($stmt->execute()) {
        $stmt = DB::connect()->prepare('UPDATE prices SET quantity = quantity - :quantity WHERE price_id = :price_id');
        $stmt->bindParam(':quantity', $data['qte']);
        $stmt->bindParam(':price_id', $data['price_id']);
        $stmt->execute();
        return 'ok';
        // } else {
        //     return 'error';
        // }
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
    }



    static public function selectCodes($price_id)
    {
        // $code = rand(100000, 999999);
        $code = self::gen_uid(6);
        // $stmt = DB::connect()->prepare('SELECT code, code_id FROM codes WHERE price_id = :price_id');
        // // $stmt->bindParam(':code', $code);
        // $stmt->bindParam(':price_id', $price_id);
        // $stmt->execute();
        // $result = $stmt->fetchAll(PDO::FETCH_OBJ)[0];
        // die();
        // if ($result) {
        //     self::selectCodes($price_id);
        // } else {
        $stmt = DB::connect()->prepare('INSERT INTO codes (code,price_id) VALUES (:code,:price_id)');
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':price_id', $price_id);
        $stmt->execute();
        $stmt = DB::connect()->prepare('SELECT code_id FROM codes WHERE code = :code');
        // $stmt->bindParam(':code', $code);
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ)[0];
        return $result->code_id;
    }

    static public function gen_uid($l = 15)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, $l);
    }



    //create a function that get user order joinded with codes
    static public function getUserOrders($user_id)
    {
        $stmt = DB::connect()->prepare("SELECT users.user_id,orders.*,codes.code FROM users JOIN orders ON orders.user_id = users.user_id JOIN codes ON codes.code_id = orders.code_id WHERE users.user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    static public function displayOrders() {
        $stmt = DB::connect()->prepare('SELECT * FROM orders ORDER BY done_at DESC');
        $stmt->execute();
        $orders = $stmt->fetchAll();
        return $orders;
        $stmt = null;
    }
}
