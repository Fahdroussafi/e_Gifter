<?php
$data = new OrdersController();
$orders = $data->getUserOrders();

?>
<title>Orders</title>
<style>
    .mainabout {
        --tw-bg-opacity: 1;
        --tw-bg-opacity: 1;
        background-color: rgb(251 248 243 / var(--tw-bg-opacity));
    }



    li {
        color: #080808;
    }
</style>
<section class="mainabout">
    <?php
    include './views/includes/navbar.php';
    ?>
    <div class="flex justify-center py-16 font-ink text-5xl font-bold text-[#080808]">My Orders</div>
    <div class="relative overflow-x-auto sm:rounded-lg min-h-screen py-20">
        <table class="w-full text-base text-left text-[#080808]">
            <thead class="text-base text-[#080808] uppercase">

                <tr class="border-b border-black ">
                    <th scope="col" class="px-6 py-3">
                        Product Brand
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Code
                    </th>

                </tr>
            </thead>
            <tbody>
            <tbody>
                <?php foreach ($orders as $order) : ?>
                    <tr class="border-b border-black  rounded ">
                        <th scope="row" class="px-6 py-4 font-medium text-[#080808] whitespace-nowrap text-base sm-text-sm font-proza ">
                            <?= $order->product ?>
                        </th>
                        <td class="px-6 py-4 text-base sm-text-sm text-[#080808] font-proza ">
                            <?= $order->qte ?>
                        </td>
                        <td class="px-6 py-4 text-base sm-text-sm text-[#080808] font-proza ">
                            <?= $order->price ?>
                        </td>
                        <td class="px-6 py-4 text-base sm-text-sm text-[#080808] font-proza ">
                            <?= $order->total ?>
                        </td>
                        <td class="px-6 py-4 text-base sm-text-sm text-[#080808] font-proza ">
                            <?= $order->code ?>
                        </td>

                    </tr>
            </tbody>
        <?php endforeach; ?>

        </table>
    </div>
</section>
</body>
<!-- footer -->

<?php
include './views/includes/footer.php';
?>
<!-- end footer -->