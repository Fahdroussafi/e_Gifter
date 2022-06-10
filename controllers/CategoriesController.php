<?php

class CategoriesController
{
    public function getAllCategories()
    {
        $categories = Category::getAll();
        return $categories;
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
