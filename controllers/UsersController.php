<?php

class UsersController
{
    public function auth()
    {
        if (isset($_POST["submit"])) {
            $data["username"] = $_POST["username"];
            $result = User::login($data);
            if ($result->username === $_POST["username"] && password_verify($_POST["password"], $result->password)) {
                $_SESSION["logged"] = true;
                $_SESSION["username"] = $result->username;
                $_SESSION["fullname"] = $result->fullname;
                $_SESSION["admin"] = $result->admin;
                $_SESSION["user_id"] = $result->user_id;
                Redirect::to("home");
                if ($result->admin == true) {
                    Redirect::to("dashboard");
                }
            } else {
                Session::set("error", "User or password incorrect");
                Redirect::to("login");
            }
        }
    }
    public function register()
    {
        $options = [
            "cost" => 12
        ];
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);
        $data = array(
            "fullname" => $_POST["fullname"],
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "password" => $password,
        );
        $result = User::createUser($data);
        if ($result === "ok") {
            Session::set("success", "Account created successfully");
            Redirect::to("login");
        } else {
            echo $result;
        }
        if ($result === "error") {
            Session::set("error", "Email is already used");
            Redirect::to("register");
        }
    }

    public function updateUser()
    {
        $data = array(
            "fullname" => $_POST["fullname"],
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "user_id" => $_SESSION["user_id"],
        );
        $result = User::update($data);
        if ($result === "ok") {
            Session::set("success", "user updated");
            Redirect::to("myprofile");
        } else {
            echo $result;
        }
    }

    public function like()
    {
        if (isset($_POST["submit"])) {
            $data = array(
                "user_id" => $_SESSION["user_id"],
                "product_id" => $_POST["product_id"]
            );
            $result = Wishlist::add($data);
            if ($result === "ok") {
                Session::set("success", "Product added to your wishlist");
                Redirect::to("productslist");
            } else {
                Session::set("error", "Product is already in your wishlist");
                Redirect::to("likes");
            }
        }
    }
    public function unlike($pid)
    {
        $result = Wishlist::remove($pid);
        if ($result === "ok") {
            Session::set("error", "Product removed from your wishlist");
            Redirect::to("likes");
        } else {
            Session::set("error", "Product is not in your wishlist");
            Redirect::to("likes");
        }
    }

    public function ShowWishlist()
    {
        $wishlist = Wishlist::getAll();
        return $wishlist;
    }

    public function logout()
    {
        session_destroy();
    }
}

