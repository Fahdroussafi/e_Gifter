<?php

class Category
{
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM categories');
        $stmt->execute();
        return $stmt->fetchAll();
        // $stmt->close();
        $stmt = null;
    }
    static public function addCategory($data)
    {
        $stmt = DB::connect()->prepare('INSERT INTO categories (cat_title) VALUES (:cat_title)');
        $stmt->bindParam(':cat_title', $data['cat_title']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        // $stmt->close();
        $stmt = null;
    }
    static public function deleteCategory($data)
    {
        $id = $data['id'];
        try {
            $stmt = DB::connect()->prepare('DELETE FROM categories WHERE cat_id = :id');
            $stmt->execute(array(":id" => $id));
            $category = $stmt->fetch(PDO::FETCH_OBJ);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
            // $stmt->close();
            $stmt = null;
        } catch (PDOException $ex) {
            echo "erreur " . $ex->getMessage();
        }
    }
    static public function editCategory($data)
    {
        $stmt = DB::connect()->prepare('UPDATE categories SET 
                cat_title = :cat_title
                WHERE cat_id=:cat_id');
        $stmt->bindParam(':cat_id', $data['cat_id']);
        $stmt->bindParam(':cat_title', $data['cat_title']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        // $stmt->close();
        $stmt = null;
    }
    static public function getCategoryById($data)
    {
        $id = $data['id'];
        try {
            $stmt = DB::connect()->prepare('SELECT * FROM categories WHERE cat_id = :id');
            $stmt->execute(array(":id" => $id));
            $category = $stmt->fetch(PDO::FETCH_OBJ);
            return $category;
            // $stmt->close();
            $stmt = null;
        } catch (PDOException $ex) {
            echo "erreur " . $ex->getMessage();
        }
    }
}
