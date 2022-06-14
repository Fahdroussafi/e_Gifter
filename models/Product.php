<?php

class Product
{
    // function that get all the products in products page in the frontend
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM products');
        $stmt->execute();
        return $stmt->fetchAll(); // returns an array of arrays (2D array) with all the products in the database (all the rows)
        $stmt = null; // close connection
    }
    // function that get all the products randomly in the frontend in the homepage
    static public function getRandom($count)
    {
        $stmt = DB::connect()->prepare("SELECT * FROM products order by rand() limit " . $count);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
    // function that filters the products in the frontend in the products page
    static public function getProductByCat($data)
    {
        $id = $data['id'];
        try {
            $stmt = DB::connect()->prepare('SELECT * FROM products WHERE product_category_id = :id');
            $stmt->execute(array(":id" => $id));
            return $stmt->fetchAll();
            $stmt = null;
        } catch (PDOException $ex) {
            echo "erreur " . $ex->getMessage();
        }
    }
    // function that show the product details in the frontend in the product details page
    static public function getProductById($data)
    {
        $id = $data['id'];
        try {
            $stmt = DB::connect()->prepare('SELECT * FROM products WHERE product_id = :id');
            $stmt->execute(array(":id" => $id));
            $product = $stmt->fetch(PDO::FETCH_OBJ);
            return $product;
            // $stmt->close();
            $stmt = null;
        } catch (PDOException $ex) {
            echo "erreur " . $ex->getMessage();
        }
    }
    // function that get the prices of the products in the frontend in the product details page
    static public function getValues($id)
    {
        try {
            $stmt = DB::connect()->prepare("SELECT * FROM prices where product_id = :id");
            $stmt->execute(array(":id" => $id));
            $stmt->execute();
            $value = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $value;
            $stmt = null;
        } catch (PDOException $ex) {
            echo "erreur " . $ex->getMessage();
        }
    }
    // static public function getPrices()
    // {
    //     $stmt = DB::connect()->prepare("SELECT products.*,prices.* FROM products JOIN prices ON prices.product_id = products.product_id");
    //     $stmt->execute();
    //     $prices = $stmt->fetchAll(PDO::FETCH_OBJ);
    //     return $prices;
    // }

    // function that add a new product in the admin dashboard
    static public function addProduct($data)
    {
        $stmt = DB::connect()->prepare('INSERT INTO products (product_title,product_description,product_image,short_desc,product_category_id)
        VALUES (:product_title,:product_description,:product_image,:short_desc,:product_category_id)');
        $stmt->bindParam(':product_title', $data['product_title']);
        $stmt->bindParam(':product_description', $data['product_description']);
        $stmt->bindParam(':product_image', $data['product_image']);
        $stmt->bindParam(':short_desc', $data['short_desc']);
        $stmt->bindParam(':product_category_id', $data['product_category_id']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        $stmt = null;
    }

    // function to add to stock of a product in the admin dashboard
    static public function addPrices($data)
    {
        $stmt = DB::connect()->prepare('SELECT price FROM prices WHERE product_id = :product_id and price = :price');
        $stmt->execute(array(":product_id" => $data['product_id'], ":price" => $data['price']));
        $count = $stmt->rowCount();
        if ($count > 0) {
            return 'error';
        } else {
            $stmt = DB::connect()->prepare('INSERT INTO prices (product_id,price,quantity)
            VALUES (:product_id,:price,:quantity)');
            $stmt->bindParam(':product_id', $data['product_id']);
            $stmt->bindParam(':price', $data['price']);
            $stmt->bindParam(':quantity', $data['quantity']);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        }
    }

    static public function editProduct($data)
    {
        $stmt = DB::connect()->prepare('UPDATE products SET 
                product_title = :product_title,
                product_description=:product_description,
                product_image=:product_image,
                short_desc=:short_desc,
                product_category_id=:product_category_id
                WHERE product_id=:product_id
        ');
        $stmt->bindParam(':product_id', $data['product_id']);
        $stmt->bindParam(':product_title', $data['product_title']);
        $stmt->bindParam(':product_description', $data['product_description']);
        $stmt->bindParam(':product_image', $data['product_image']);
        $stmt->bindParam(':short_desc', $data['short_desc']);
        $stmt->bindParam(':product_category_id', $data['product_category_id']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        $stmt = null;
    }

    static public function deleteProduct($data)
    {
        $id = $data['id'];
        try {
            $stmt = DB::connect()->prepare('DELETE FROM products WHERE product_id = :id');
            $stmt->execute(array(":id" => $id));
            $product = $stmt->fetch(PDO::FETCH_OBJ);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
            $stmt = null;
        } catch (PDOException $ex) {
            echo "erreur " . $ex->getMessage();
        }
    }
    // calculate the revenue
    static public function getTotalPrice()
    {
        $stmt = DB::connect()->prepare('SELECT SUM(price) AS total FROM orders');
        $stmt->execute();
        $total = $stmt->fetch(PDO::FETCH_OBJ);
        return $total;
        $stmt = null;
    }
    // calculate the numbers of products that have been sold
    static public function getTotalQuantity()
    {
        $stmt = DB::connect()->prepare('SELECT SUM(qte) AS total FROM orders');
        $stmt->execute();
        $total = $stmt->fetch(PDO::FETCH_OBJ);
        return $total;
        $stmt = null;
    }

    // display the stock of the products
    static public function displayQuantity()
    {
        $stmt = DB::connect()->prepare('SELECT SUM(quantity) as stock FROM prices');
        $stmt->execute();
        $total = $stmt->fetch(PDO::FETCH_OBJ);
        return $total;
        $stmt = null;
    }
}
