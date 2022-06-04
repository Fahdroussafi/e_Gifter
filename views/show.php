<?php

$data = new ProductsController();
$product = $data->getProduct();

$value = $data->getValue();

$id = $_POST['product_id'];

if (isset($_POST["submit"])) {
    $data = new UsersController();
    $product = $data->like();
}
?>

<title>Product</title>
</head>
<?php
include('./views/includes/alerts.php')
?>

<body>
    <style>
        .mainabout {
            padding: 1vw 2vw 0 2vw;
        }

        li {
            color: #F4F5E2;
            font-weight: bold;
        }

        .ink {
            font-family: ink free;
        }
    </style>
    <section class="mainabout">
        <header>

            <?php
            include './views/includes/navbar.php';
            ?>
        </header>

        <style>
            @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
        </style>
        <div class="min-w-screen min-h-screen flex items-center p-5 lg:p-10 overflow-hidden relative">
            <div class="w-full max-w-6xl rounded bg-white first:shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
                <div class="md:flex items-center -mx-10">
                    <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                        <div class="relative">
                            <img src="./public/uploads/<?php echo $product->product_image; ?>" class="w-full relative z-10" alt="">
                            <div class="border-4 absolute top-10 bottom-10 left-10 right-10 z-0"></div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-10 font-proza">
                        <div class="mb-10">

                            <h1 class="font-bold uppercase text-2xl mb-5 text-black"> <?php echo $product->product_title; ?> </h1>
                            <p class="text-sm text-black"> <?php echo $product->product_description; ?></p>
                        </div>
                        <div>
                            <div class="inline-block align-bottom mr-5">
                                <span class="text-2xl leading-none align-baseline text-black "> Starts At $</span>
                                <span class="font-bold text-5xl leading-none align-baseline text-black"> 10 </span>
                            </div>
                            <div class="inline-block align-bottom">


                                <form method="post" action="<?php echo BASE_URL; ?>checkout">
                                    <div class="form-group">
                                        <input type="number" name="product_qte" id="product_qte" class="text-black border-2 border-black rounded-lg pt-1 shadow-lg bg-white" value="1" min="1">
                                        <input type="hidden" name="product_title" value="<?php echo $product->product_title; ?>">
                                        <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
                                        <input type="hidden" name="selectedPrice" id="price" value="">
                                        <button class="bg-red-600 text-white rounded-full text-center duration-500 ease-in-out hover:scale-95 px-10 py-2 font-semibold"><i class="mdi mdi-cart -ml-2 mr-2"></i> ADD TO CART</button>

                                    </div>


                                    <select name="price_id" id="product_price" class="text-black border-2 border-emerald-600" required>
                                        <option class="text-black" value="">Choose price</option>'
                                        <?php
                                        foreach ($value as $values) {
                                            echo '<option class="text-black" value="' . $values->price_id . '">' . $values->price . ' </option>';
                                        }
                                        ?>
                                    </select>
                                </form>
                                <form method="post" action="">
                                    <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
                                    <button name="submit" class="btn heart"><i class="fas fa-heart"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <div class="mt-10">
            <?php
            include './views/includes/footer.php';
            ?>
        </div>
        <!-- end footer -->
    </section>

    <script>
        const product_qte = document.getElementById('product_qte'); // get the input
        const product_price = document.getElementById('product_price');
        const prices = <?php echo json_encode($value); ?>; // get the prices

        const price = document.getElementById('price');

        product_qte.addEventListener('change', checkQte);
        product_price.addEventListener('change', (e) => {
            checkQte();
            let priceValue = prices.find(price => price.price_id == e.target.value).price;
            price.value = priceValue;
        });


        function checkQte() {
            const selectedPrice = prices.find(price => price.price_id == product_price.value);
            if (parseInt(selectedPrice.quantity) < parseInt(product_qte.value)) {
                alert('Sorry, we only have ' + selectedPrice.quantity + ' left in stock');
                product_qte.value = selectedPrice.quantity;
                return false;
            }

            return true;
        }
    </script>
</body>