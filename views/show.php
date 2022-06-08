<?php

$data = new ProductsController();
$product = $data->getProduct();
$value = $data->getValue();

$id = $_POST['product_id']; // get the product id from the form

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

<body class="bg-[#FBF8F3] min-h-screen" >
    <style>
        .mainabout {
            padding: 1vw 2vw 0 2vw;
        }

        li {
            color: #080808;
            font-weight: bold;
        }

        .ink {
            font-family: ink free;
        }
    </style>
    <section class="mainabout">

        <?php
        include './views/includes/navbar.php';
        ?>

        <!-- component -->
        <section class="font-proza text-[#080808] body-font overflow-hidden my-24 ">
            <div class="container px-5 py-24 mx-auto bg-white rounded">
                <div class="md:w-4/5 lg:w-full justify-center mx-auto flex flex-wrap">
                    <img alt="ecommerce" class="w-60 h-52" src="./public/uploads/<?php echo $product->product_image; ?>">
                    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1"><?php echo $product->product_title; ?></h1>

                        <p class="leading-relaxed"><?php echo $product->product_description; ?></p>
                        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">

                            <div class="flex ml-6 items-center">
                                <span class="mr-3">Price</span>
                                <div class="relative">

                                    <select name="price_id" id="product_price" required class="rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10">
                                        <option class="text-black" value="">Choose price</option>'

                                        <?php
                                        foreach ($value as $values) {
                                            echo '<option class="text-black" value="' . $values->price_id . '">' . $values->price . ' </option>';
                                        }
                                        ?>
                                    </select>
                                    <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex">
                            <form method="POST" action="<?php echo BASE_URL; ?>checkout">

                                <span class="title-font font-medium text-2xl text-gray-900">Starts At 10 $</span>
                                <input type="number" name="product_qte" id="product_qte" class="mx-1 text-black border-2 border-black rounded-lg pt-1 shadow-lg bg-[F4F5E2]" value="1" min="1">
                                <input type="hidden" name="product_title" value="<?php echo $product->product_title; ?>">
                                <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
                                <input type="hidden" name="selectedPrice" id="price" value="">
                                <button class="flex xsm:w-full justify-center my-4 bg-red-600 text-[#F4F5E2] rounded-full duration-500 ease-in-out hover:scale-95 px-10 py-2 font-semibold"><i class="mdi mdi-cart -ml-2 mr-2"></i>ADD TO CART</button>
                            </form>
                            <form method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
                                <button name="submit" class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <!-- footer -->
    <?php
    include './views/includes/footer.php';
    ?>
    
    <!-- end footer -->
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