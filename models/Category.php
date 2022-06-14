<?php

class Category
{
    // function that get all the categories in the database
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM categories');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
    // function that add a new category in the admin dashboard
    static public function addCategory($data)
    {
        $stmt = DB::connect()->prepare('INSERT INTO categories (cat_title) VALUES (:cat_title)');
        $stmt->bindParam(':cat_title', $data['cat_title']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        $stmt = null;
    }
    // function that delete a category in the admin dashboard
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
            $stmt = null;
        } catch (PDOException $ex) {
            echo "erreur " . $ex->getMessage();
        }
    }
    // function that update a category in the admin dashboard
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
        $stmt = null;
    }

    // function that get the category by id  when you try to update the category in the admin dashboard
    static public function getCategoryById($data)
    {
        $id = $data['id'];
        try {
            $stmt = DB::connect()->prepare('SELECT * FROM categories WHERE cat_id = :id');
            $stmt->execute(array(":id" => $id));
            $category = $stmt->fetch(PDO::FETCH_OBJ);
            return $category;
            $stmt = null;
        } catch (PDOException $ex) {
            echo "erreur " . $ex->getMessage();
        }
    }
}

