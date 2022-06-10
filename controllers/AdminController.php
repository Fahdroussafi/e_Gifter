<?php

class AdminController
{
    public function index($page)
    {
        include('views/admin/' . $page . '.php');
    }

    public function getTotalClients()
    {
        // controller to get the total number of clients
        $total = User::getAllClients();
        return $total;
    }
    public function ShowUsers()
    {
        // controller to get the total number of clients
        $total = User::ShowUsers();
        return $total;
    }
    public function newProduct()
    {
        if (isset($_POST["submit"])) {
            $data = array(
                "product_title" => $_POST["product_title"],
                "product_description" => $_POST["product_description"],
                "short_desc" => $_POST["short_desc"],
                "product_image" => $this->uploadPhoto(),
                "product_category_id" => $_POST["product_category_id"],
            );
            $result = Product::addProduct($data);
            if ($result === "ok") {
                Session::set("success", "Product added successfully");
                Redirect::to("products");
            } else {
                echo $result;
            }
        }
    }

    // ADD NEW PRICES TO THE PRODUCTS AVAILABLE
    public function newPrice()
    {
        if (isset($_POST["submit"])) {
            $data = array(
                "product_id" => $_POST["product_id"],
                "price" => $_POST["price"],
                "quantity" => $_POST["quantity"],
            );
            $result = Product::addPrices($data);
            if ($result === "ok") {
                Session::set("success", "Added to stock successfully");
                Redirect::to("products");
            } else {
                echo $result;
            }
        }
    }

    // UPDATE A PRODUCT
    public function updateProduct()
    {
        if (isset($_POST["submit"])) {
            $oldImage = $_POST["product_current_image"];
            $data = array(
                "product_id" => $_POST["product_id"],
                "product_title" => $_POST["product_title"],
                "product_description" => $_POST["product_description"],
                "short_desc" => $_POST["short_desc"],
                "product_image" => $this->uploadPhoto($oldImage),
                "product_category_id" => $_POST["product_category_id"],
            );
            $result = Product::editProduct($data);
            if ($result === "ok") {
                Session::set("success", "Product updated successfully");
                Redirect::to("products");
            } else {
                echo $result;
            }
        }
    }
    // UPLOAD A NEW PRODUCT IMAGE
    public function uploadPhoto($oldImage = null)
    {
        $dir = "public/uploads";
        $time = time();
        $name = str_replace(' ', '-', strtolower($_FILES["image"]["name"]));
        $type = $_FILES["image"]["type"];
        $ext = substr($name, strpos($name, '.'));
        $ext = str_replace('.', '', $ext);
        $name = preg_replace("/\.[^.\s]{3,4}$/", "", $name);
        $imageName = $name . '-' . $time . '.' . $ext;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $dir . "/" . $imageName)) {
            return $imageName;
        }
        return $oldImage;
    }
    // REMOVE A PRODUCT
    public function removeProduct()
    {
        if (isset($_POST["delete_product_id"])) {
            $data = array(
                "id" => $_POST["delete_product_id"]
            );
            $result = Product::deleteProduct($data);
            if ($result === "ok") {
                Session::set("error", "Product deleted successfully");
                Redirect::to("products");
            } else {
                echo $result;
            }
        }
    }

    // GET THE TOTAL PRICES OF THE PRODUCTS SOLD
    public function getTotal()
    {
        $total = Product::getTotalPrice();
        return $total;
    }

    public function getTotalQuantitySold()
    {
        $total = Product::getTotalQuantity();
        return $total;
    }

    public function displayOrders()
    {
        $orders = Order::displayOrders();
        return $orders;
    }
    public function newCategory()
    {
        if (isset($_POST["submit"])) {
            $data = array(
                "cat_title" => $_POST["cat_title"], 
            );
            $result = Category::addCategory($data);
            if ($result === "ok") {
                Session::set("success", "Category added successfully");
                Redirect::to("categories");
            } else {
                echo $result;
            }
        }
    }
    public function removeCategory (){
        if (isset($_POST["delete_cat_id"])) {
            $data = array(
                "id" => $_POST["delete_cat_id"]
            );
            $result = Category::deleteCategory($data);
            if ($result === "ok") {
                Session::set("error", "Category deleted successfully");
                Redirect::to("categories");
            } else {
                echo $result;
            }
        }
    }
    public function updateCategory()
    {
        if (isset($_POST["update_cat"])) {
            $data = array(
                "cat_id" => $_POST["cat_id"],
                "cat_title" => $_POST["cat_title"]
            );
            $result = Category::editCategory($data);
            if ($result === "ok") {
                Session::set("success", "Category updated successfully");
                Redirect::to("categories");
            } else {
                echo $result;
            }
        }
    }
}
