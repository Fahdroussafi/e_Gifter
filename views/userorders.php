<?php
$data = new OrdersController();
$orders = $data->getUserOrders();

// create a table that display orders with codes
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Total</th>
            <th>Code</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order) : ?>
            <tr>
                <td><?= $order->fullname ?></td>
                <td><?= $order->product ?></td>
                <td><?= $order->qte ?></td>
                <td><?= $order->price ?></td>
                <td><?= $order->total ?></td>
                <td><?= $order->code ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>