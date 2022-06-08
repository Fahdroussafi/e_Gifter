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

        <?php
        include './views/includes/navbar.php';
        ?>

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


                                <form method="POST" action="<?php echo BASE_URL; ?>checkout">
                                    <div class="form-group">
                                        <input type="number" name="product_qte" id="product_qte" class="text-black border-2 border-black rounded-lg pt-1 shadow-lg bg-white" value="1" min="1">
                                        <input type="hidden" name="product_title" value="<?php echo $product->product_title; ?>">
                                        <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
                                        <input type="hidden" name="selectedPrice" id="price" value="">
                                        <button class="bg-red-600 text-white rounded-full text-center duration-500 ease-in-out hover:scale-95 px-10 py-2 font-semibold"><i class="mdi mdi-cart -ml-2 mr-2"></i>ADD TO CART</button>

                                    </div>


                                    <select name="price_id" id="product_price" class="text-black border-2" required>
                                        <option class="text-black" value="">Choose price</option>'
                                        <?php
                                        foreach ($value as $values) {
                                            echo '<option class="text-black" value="' . $values->price_id . '">' . $values->price . ' </option>';
                                        }
                                        ?>
                                    </select>
                                </form>
                                <form method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
                                    <button name="submit" class="btn heart"><i class="fas fa-heart"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



       


            <body class="antialiased">


                

                <div class="py-6">
                  

                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
                        <div class="flex flex-col md:flex-row -mx-4">
                            <div class="md:flex-1 px-4">
                                <div x-data="{ image: 1 }" x-cloak>
                                    <div class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4">
                                        <div x-show="image === 1" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                                            <span class="text-5xl"><img src="./public/uploads/<?php echo $product->product_image; ?>"></span>
                                        </div>

                                      
                                    </div>

                                    <!-- <div class="flex -mx-2 mb-4">
                                        <template x-for="i in 4">
                                            <div class="flex-1 px-2">
                                                <button x-on:click="image = i" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }" class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                                                    <span x-text="i" class="text-2xl"></span>
                                                </button>
                                            </div>
                                        </template>
                                    </div> -->
                                </div>
                            </div>
                            <div class="md:flex-1 px-4">
                                <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl"><?php echo $product->product_title; ?> </h2>
                                <p class="text-gray-500 text-sm">By <a href="#" class="text-indigo-600 hover:underline">ABC Company</a></p>

                                <div class="flex items-center space-x-4 my-4">
                                    <div>
                                        <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                                            <span class="text-indigo-400 mr-1 mt-1">$</span>
                                            <span class="font-bold text-indigo-600 text-3xl">25</span>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-green-500 text-xl font-semibold">Save 12%</p>
                                        <p class="text-gray-400 text-sm">Inclusive of all Taxes.</p>
                                    </div>
                                </div>

                                <p class="text-gray-500"><?php echo $product->product_description; ?></p>

                                <div class="flex py-4 space-x-4">
                                    <div class="relative">
                                        <div class="text-center left-0 pt-2 right-0 absolute block text-xs uppercase text-gray-400 tracking-wide font-semibold">Qty</div>
                                        <select class="cursor-pointer appearance-none rounded-xl border border-gray-200 pl-4 pr-8 h-14 flex items-end pb-1">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>

                                        <svg class="w-5 h-5 text-gray-400 absolute right-0 bottom-0 mb-2 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                    </div>

                                    <button type="button" class="h-14 px-6 py-2 font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white">
                                        Add to Cart
                                    </button>

                                    <select name="price_id" id="product_price" class="text-black border-2" required>
                                        <option class="text-black" value="">Choose price</option>'
                                        <?php
                                        foreach ($value as $values) {
                                            echo '<option class="text-black" value="' . $values->price_id . '">' . $values->price . ' </option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
            <!-- partial -->
            <script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js'></script>

            </html>

        </div>
    </section>
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