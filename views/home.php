<title>Home</title>

<?php {
    $data = new ProductsController();
    $products = $data->getRandomProducts();
}
?>

<body>
    <!-- navbar -->
    <section class="main">
        <header>
            <?php
            include './views/includes/navbar.php';
            ?>
        </header>

        <!-- end navbar -->

        <!-- part1  -->
        <div class="hero min-h-screen">
            <div class="hero-content text-white text-center">
                <div class="max-w-md text-left ">
                    <h1 class="text-5xl font-bold font-ink">Egifter</h1>
                    <p class="font-proza text-2xl m-7  ">You've come to the right place for digital gift cards. We are the public's number one choice for digital gift cards, check out our deals and offers online and we'll see you soon!</p>
                    <div class="duration-500 ease-in-out hover:rotate-6 hover:scale-90">
                        <a href="<?php echo BASE_URL; ?>productslist" class="bg-red-600 py-2 px-10 h-10 text-center rounded-full font-proza font-bold">SEE MORE</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- end part1 -->

    <!--- Hero Section -->
    <div class="hero min-h-fit-screen bg-[#F4F5E2] py-20">
        <div class="hero-content flex-col lg:flex-row">
            <img src="./public/img/giftcards.jpg" class="rounded-full object-cover h-full w-full" />
            <div>
                <h1 class="text-5xl font-bold ink-free text-black font-ink">Shop from Hundreds of Gift Cards</h1>
                <p class="mt-6 text-2xl text-black font-proza">The best part about our digital gift cards is that they never expire. Once you give them
                    as a gift, you can use them any time. All of your purchases are protected by our 90 day return
                    policy and One-Year Hassle -Free Warranty. </p>
                <p class="mt-4 text-2xl text-black font-proza">Get an eGift Card for a special occasion, quick shopping
                    spoils, or just to show a friend how much you care..</p>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->
    <!-- Part 2 -->

    <section class="bg-green-50 py-20">
        <h1 class="text-5xl font-bold font-ink text-black text-center">Our Products</h1>
        <section class="flex gap-14 justify-center my-5 cards flex-wrap">
            <?php foreach ($products as $product) {  ?>
                <!-- loop through the products -->
                <div class="card p-6 bg-white shadow-lg hover:shadow-2xl duration-500">
                    <div>
                        <img src="./public/uploads/<?= $product['product_image'] ?>" alt="image">
                    </div>
                    <div class="card-body flex flex-col items-center justify-center">
                        <h1 class="text-black font-bold text-2xl font-proza"><?= $product['product_title'] ?></h1>
                        <p class="text-black font-proza">Starting at 10 $</p>
                    </div>
                    <div class="flex gap-2 justify-center">

                       
                        <form id="form" method="post" action="<?php echo BASE_URL ?>show">
                            <input type="hidden" name="product_id" id="product_id">
                        </form>

                        <a onclick="submitForm(<?php echo $product['product_id'];?>)" class="bg-red-600  text-white rounded-full w-2/3 text-center h-10 pt-2 cursor-pointer font-bold font-proza duration-500 ease-in-out hover:scale-95 ">SEE MORE</a>

                    </div>
                </div>

            <?php } ?>

        </section>
    </section>

    <!--  end Part 2 -->

</body>

<!-- footer -->
<div>
    <?php
    include './views/includes/footer.php';
    ?>
</div>
<!-- end footer -->

</html>