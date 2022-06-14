<?php

class CategoriesController
{
    public function getAllCategories()
    {
        $categories = Category::getAll(); // get all categories from the database and store it in $categories
        return $categories;
        // return Category::getAll();
    }
    public function getCategory()
    {
        if (isset($_POST["cat_id"])) {
            $data = array(
                'id' => $_POST["cat_id"]

            );
            $category = Category::getCategoryById($data);
            return $category;
        }
    }
}
