<?php

class OrdersController
{
    public function getAllOrders()
    {
        $orders = Order::getAll();
        return $orders;
    }
    public function addOrder($data)
    {
        $result = Order::createOrder($data);
        // var_dump($result);
        // die();
        if ($result === "ok") {
            unset($_SESSION[$data['name']]);
            unset($_SESSION['total']);
            unset($_SESSION['totaux']);
            // Session::set("success", "Commande effectuée");
            // Redirect::to("home");
        }
    }

    public function getCodes($price_id)
    {
        $codes = Order::selectCodes($price_id);
        return $codes;
    }

    public function getUserOrders()
    {
        $orders = Order::getUserOrders($_SESSION["user_id"]);
        return $orders;
    }
}