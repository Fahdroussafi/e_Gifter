<?php

class Order
{
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM orders');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    static public function createOrder($data)
    {

        $code = self::selectCodes($data["price_id"]);

        $stmt = DB::connect()->prepare('INSERT INTO orders (fullname,product,qte,price,total,code_id,user_id) VALUES (:fullname,:product,:qte,:price,:total,:code,:user_id)');
        $stmt->bindParam(':fullname', $data['fullname']);
        $stmt->bindParam(':product', $data['product']);
        $stmt->bindParam(':qte', $data['qte']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':total', $data['total']);
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        if ($stmt->execute()) {
            $stmt = DB::connect()->prepare('UPDATE prices SET quantity = quantity - :quantity WHERE price_id = :price_id');
            $stmt->bindParam(':quantity', $data['qte']);
            $stmt->bindParam(':price_id', $data['price_id']);
            $stmt->execute();
            return 'ok';
        } else {
            return 'error';
        }
    }

    static public function selectCodes($price_id)
    {
        $stmt = DB::connect()->prepare('SELECT code, code_id FROM codes WHERE price_id = :price_id AND `status` = 0 LIMIT 1');
        $stmt->bindParam(':price_id', $price_id);
        $stmt->execute();

        $code = $stmt->fetchAll(PDO::FETCH_OBJ)[0];

        $stmt = DB::connect()->prepare("UPDATE `codes` SET `status` = '1' WHERE `codes`.`code_id` = :code");
        $stmt->bindParam(':code', $code->code_id);
        $stmt->execute();

        return $code->code_id;
    }

    //create a function that get user order joinded with codes
    static public function getUserOrders($user_id)
    {
        $stmt = DB::connect()->prepare("SELECT users.user_id,orders.*,codes.code FROM users JOIN orders ON orders.user_id = users.user_id JOIN codes ON codes.code_id = orders.code_id WHERE users.user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
