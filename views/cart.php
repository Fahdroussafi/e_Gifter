<title>Cart</title>

<?php
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
// die;
?>
<!-- navbar -->
<style>
    .mainabout {
        padding: 1vw 2vw 0 2vw;
    }

    li {
        color: #080808;
        /* font-weight: bold; */
    }
</style>
<section class="mainabout">
    <?php
    include './views/includes/navbar.php';
    ?>

    <body class="bg-slate-100 ">
        <div class="flex justify-center py-16 font-ink text-5xl font-bold text-[#080808] ">Shopping Cart</div>

        <!-- component -->
        <div class="flex justify-center min-h-screen mb-16">

            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                <div class="flex-1">
                    <table class="w-full text-sm lg:text-base" cellspacing="0">
                        <thead>
                            <tr class="h-12 uppercase">
                                <div class="pt-5">
                                    <h6 class="mb-0"><a href="<?php echo BASE_URL; ?>productslist" class="text-body font-proza text-3xl"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                </div>
                                <!-- <th class="hidden md:table-cell"></th> -->
                                <th class="text-left text-[#080808]">Product</th>
                                <th class="lg:text-right text-left pl-5 lg:pl-0 text-[#080808]">
                                    <span class="lg:hidden text-[#080808]" title="Quantity">Qtd</span>
                                    <span class="hidden lg:inline text-[#080808]">Quantity</span>
                                </th>
                                <th class="hidden text-right md:table-cell text-[#080808]">Unit price</th>
                                <th class="text-right text-[#080808]">Total price</th>
                            </tr>
                        </thead>
                        <!-- <tbody>

                    </tbody> -->
                        <?php foreach ($_SESSION as $name => $product) : ?>
                            <?php if (substr($name, 0, 9) == "products_") : ?>

                                <tr>
                                    <td>
                                        <p class="mb-2 md:ml-4 text-[#080808]">
                                            <?php echo $product["title"]; ?>
                                        </p>

                                        <form method="POST" action="<?php echo BASE_URL; ?>cancelcart">
                                            <input type="hidden" name="product_id" value="<?php echo $product["id"]; ?>">
                                            <input type="hidden" name="product_price" value="<?php echo $product["total"]; ?>">
                                            <button type="submit" class="text-gray-700 md:ml-4">
                                                <small class="text-red-700 underline">Remove item</small>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="justify-center md:justify-end md:flex mt-6">
                                        <div class="w-20 h-10">
                                            <div class="relative flex flex-row w-full h-8">
                                                <div class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-[#080808] focus:text-[#080808]">
                                                    <?php echo $product["qte"]; ?>
                                                </div>
                                                <!-- <input type="number" value="2" class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-[#080808] focus:text-[#080808]" /> -->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="hidden text-right md:table-cell">
                                        <span class="text-sm lg:text-base font-medium text-[#080808]">
                                            <?php echo $product["selectedPrice"]; ?>
                                        </span>
                                    </td>

                                    <!-- </td> -->
                                    <td class="text-right ">
                                        <span class="text-sm lg:text-base font-medium text-[#080808]">
                                            <?php echo $product["total"]; ?> $
                                        </span>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <hr class="pb-6 mt-6">
                    <div class="my-4 mt-6 -mx-2 lg:flex">
                        <div class="lg:px-2 lg:w-1/2">

                            <div class="p-4 bg-gray-100 rounded-full text-[#080808]">
                                <h1 class="ml-2 font-bold uppercase text-[#080808]">Order Details</h1>
                            </div>

                            <div class="flex justify-between pt-4 border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-[#080808]">
                                    Subtotal
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-[#080808]">
                                    <?php echo isset($_SESSION["totaux"]) ? $_SESSION["totaux"] : 0; ?>
                                    <strong id="amount" data-amount="<?php echo isset($_SESSION["totaux"]) ? $_SESSION["totaux"] : 0;  ?>">
                                    </strong>
                                </div>

                            </div>
                            <?php if (isset($_SESSION["count"]) && $_SESSION["count"] > 0) : ?>
                                <form method="post" action="<?php echo BASE_URL; ?>emptycart">
                                    <button type="submit" class="bg-[#CC0000] text-[#FBF8F3] rounded-full w-full text-center h-10 pt-2 cursor-pointer font-bold font-proza duration-500">
                                        Vider le panier
                                    </button>
                                </form>
                            <?php endif; ?>

                            <div class="py-5">

                                <?php if (isset($_SESSION["count"]) && $_SESSION["count"] > 0 && isset($_SESSION["logged"])) : ?>
                                    <div id="paypal-button-container"></div>
                                <?php elseif (isset($_SESSION["count"]) && $_SESSION["count"] > 0) : ?>
                                    <a href="<?php echo BASE_URL; ?>login" class="btn btn-link">Login to complete your orders</a>
                                <?php endif; ?>
                                <form method="post" id="addOrder" action="<?php echo BASE_URL; ?>addOrder"></form>
                                <form method="post" id="addOrder" action="<?php echo BASE_URL; ?>addOrder">
                                <button class="btn btn-primary">buy</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
</body>
<!-- footer -->
<?php
include './views/includes/footer.php';
?>
<!-- end footer -->

<script>
    let amount = document.querySelector('#amount').dataset.amount;
    let finalAmount = Math.floor(amount / 9.86);
    paypal.Buttons({
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: finalAmount.toString()
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                alert('Transaction completed by ' + details.payer.name.given_name);
                document.querySelector('#addOrder').submit();
            });
        }
    }).render('#paypal-button-container');
    //This function displays Smart Payment Buttons on your web page.
</script>