<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/bc3854343b.js" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@2.14.3/dist/full.css" rel="stylesheet" type="text/css" /> -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://www.paypal.com/sdk/js?client-id=AZw6O6tc7UhTWz2cNKSSzG_-ASZlWVO30PNwPFZpxiPKJyOfFuA5ugiPLfzwSpjS0wiCPv5kDW35__Yu&components=buttons"></script>
    <link href="./views/src/output.css" rel="stylesheet">

</head>
<?php
// echo '<pre>';
// var_dump($_SESSION);
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
        font-weight: bold;
    }
</style>
<section class="mainabout">
    <header>
        <?php
        include './views/includes/navbar.php';
        ?>
    </header>

    <?php
    include('./views/includes/alerts.php')
    ?>

    <body class="bg-slate-100">
        <div class="my-5">
        <a href="<?php echo BASE_URL ?>productslist" class="font-proza text-2xl text-black">Back</a>
        </div>
        <!-- component -->
        <div class="flex justify-center my-6">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                <div class="flex-1">
                    <table class="w-full text-sm lg:text-base" cellspacing="0">
                        <thead>
                            <tr class="h-12 uppercase">
                                <!-- <th class="hidden md:table-cell"></th> -->
                                <th class="text-left text-black">Product</th>
                                <th class="lg:text-right text-left pl-5 lg:pl-0 text-black">
                                    <span class="lg:hidden text-black" title="Quantity">Qtd</span>
                                    <span class="hidden lg:inline text-black">Quantity</span>
                                </th>
                                <th class="hidden text-right md:table-cell text-black">Unit price</th>
                                <th class="text-right text-black">Total price</th>
                            </tr>
                        </thead>
                        <!-- <tbody>

                    </tbody> -->
                        <?php foreach ($_SESSION as $name => $product) : ?>
                            <?php if (substr($name, 0, 9) == "products_") : ?>

                                <tr>
                                    <td>
                                        <p class="mb-2 md:ml-4 text-black"><?php echo $product["title"]; ?></p>

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
                                                <div class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black">
                                                    <?php echo $product["qte"]; ?>
                                                </div>
                                                <!-- <input type="number" value="2" class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black" /> -->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="hidden text-right md:table-cell">
                                        <span class="text-sm lg:text-base font-medium text-black">
                                            <?php echo $product["selectedPrice"]; ?>
                                        </span>
                                    </td>

                                    <!-- </td> -->
                                    <td class="text-right ">
                                        <span class="text-sm lg:text-base font-medium text-black">
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

                            <div class="p-4 bg-gray-100 rounded-full text-black">
                                <h1 class="ml-2 font-bold uppercase text-black">Order Details</h1>
                            </div>

                            <div class="flex justify-between pt-4 border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-black">
                                    Total
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-black">
                                    <strong class="text-black" id="amount" data-amount="<?php echo $_SESSION["totaux"]; ?>">
                                        <?php echo isset($_SESSION["totaux"]) ? $_SESSION["totaux"] : 0; ?> <span class="text-black">$</span>
                                    </strong>
                                </div>
                            </div>
                            <a href="#">
                                <button class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                                    <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path fill="currentColor" d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z" />
                                    </svg>
                                    <span class="ml-2 mt-5px">Procceed to checkout</span>
                                </button>
                            </a>
                            <div class="py-5">
                                <?php if (isset($_SESSION["count"]) && $_SESSION["count"] > 0 && isset($_SESSION["logged"])) : ?>
                                    <div id="paypal-button-container"></div>
                                <?php elseif (isset($_SESSION["count"]) && $_SESSION["count"] > 0) : ?>
                                    <a href="<?php echo BASE_URL; ?>login" class="btn btn-link">Connectez vous pour terminer vos achats</a>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    </body>
    <!-- footer -->
<footer>
    <?php
    include './views/includes/footer.php';
    ?>
</footer>
<!-- end footer -->
</html>

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
                    alert('Commande effectuée par ' + details.payer.name.given_name);
                    document.querySelector('#addOrder').submit();
                });
            }
        }).render('#paypal-button-container');
        //This function displays Smart Payment Buttons on your web page.
    </script>