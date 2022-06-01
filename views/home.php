<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/bc3854343b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.14.3/dist/full.css" rel="stylesheet" type="text/css" />
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link href="./views/src/output.css" rel="stylesheet">


</head>

<?php {
    $data = new ProductsController();
    $products = $data->getRandomProducts();

    // echo '<pre>';
    // print_r($_SESSION);
    // exit;
}
?>

<body>
    <!-- navbar -->
    <style>
        li {
            font-weight: bold;
        }
    </style>
    <section class="main">
        <header>
            <?php
            include './views/includes/navbar.php';
            ?>
        </header>

        <!-- end navbar -->

        <!-- part1  -->
        <div class="hero min-h-screen">
            <!-- <div class="hero-overlay"></div> -->
            <div class="hero-content text-white text-center">
                <div class="max-w-md text-left ">
                    <h1 class="text-5xl font-bold ink-free">Egifter</h1>
                    <p class="font-proza text-2xl m-7  ">You've come to the right place for digital gift cards. We are the public's number one choice for digital gift cards, check out our deals and offers online and we'll see you soon!</p>
                    <!-- <a href="<?php echo BASE_URL ?>products" class="btn btn-primary btn-lg">Shop Now</a> -->
                    <div class="duration-500 ease-in-out hover:rotate-6 hover:scale-90">

                        <a href="<?php echo BASE_URL; ?>productslist" class="bg-red-600 py-2 px-10 h-10 text-center rounded-full font-proza font-bold">SEE MORE</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- end part1 -->

    <!--- Hero Section -->
    <div class="hero min-h-fit-screen bg-[#F4F5E2] pb-40">
        <div class="hero-content flex-col lg:flex-row">
            <img src="./public/img/giftcards.jpg" class="rounded-full object-cover h-full w-full pt-16" />
            <div>
                <h1 class="text-5xl font-bold ink-free text-black">Shop from Hundreds of Gift Cards</h1>
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

    <section class="bg-green-50 pb-5 pt-5 ">
        <h1 class="text-5xl font-bold ink-free text-black text-center ">Our Products</h1>
        <section class="flex gap-14 justify-center mt-20 mb-20 cards flex-wrap">
            <?php foreach ($products as $product) {  ?>
                <!-- loop through the products -->
                <div class="card p-6 bg-white shadow-lg hover:shadow-2xl duration-500" style="width: 18rem">
                    <div>
                        <img src="./public/uploads/<?= $product['product_image'] ?>" alt="image">
                    </div>
                    <div class="card-body flex flex-col items-center justify-center">
                        <h1 class="text-black font-bold text-2xl font-proza"><?= $product['product_title'] ?></h1>
                        <p class="text-black font-proza">Starting at <?= $product['product_price'] ?>$</p>
                    </div>
                    <div class="flex gap-2 justify-center">

                        <!-- <a onclick="addToBasket(this)" data-prod-maxqte="<?= $product['product_quantity'] ?>" data-prod-id="<?= $product['product_id'] ?>" data-prod-nom="<?= $product['product_title'] ?>" data-prod-prix="<?= $product['product_price'] ?>" data-prod-image="<?= $product['product_image'] ?>">
                            <img src="./public/img/add to cart.svg" class="duration-500 ease-in-out hover:scale-125"></a> -->
                        <form id="form" method="post" action="<?php echo BASE_URL ?>show">
                            <input type="hidden" name="product_id" id="product_id">
                        </form>

                        <a onclick="submitForm(<?php echo $product['product_id'];?>)" class="bg-red-600  text-white rounded-full w-2/3 text-center h-10 pt-2 cursor-pointer font-bold font-proza duration-500 ease-in-out hover:scale-95 ">SEE MORE</a>

                        <a href="#"><img src="./public/img/add to wishlist.svg" alt="add to wishlist" class="duration-500 ease-in-out hover:scale-125"></a>
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

<script src="./public/js/main.js"></script>