<?php
$categories = new CategoriesController();
$categories = $categories->getAllCategories();
if (isset($_POST["cat_id"])) {
    $products = new ProductsController();
    $products = $products->getProductsByCategory($_POST['cat_id']);
} else {
    $data = new ProductsController();
    $products = $data->getAllProducts();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/navbar.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/bc3854343b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.14.3/dist/full.css" rel="stylesheet" type="text/css" />
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link href="./views/src/output.css" rel="stylesheet">
    <script src="./public/js/main.js"></script>

</head>

<body>
    <!-- navbar -->
    <style>
        .mainabout {
            background: #f5f5f5;
            padding: 1vw 2vw 0 2vw;
        }

        li {
            color: #080808;
            font-weight: bold;
        }

        .proza {
            font-family: 'Proza Libre', sans-serif;
        }
    </style>
    <section class="mainabout">
        <header>

            <?php
            include './views/includes/navbar.php';
            ?>
        </header>
    </section>

    <!-- end navbar -->


    <div class="flex gap-5 justify-center py-16 bg-green-50 flex-wrap ">
        <?php
        foreach ($categories as $category) :
        ?>
            <li class="list-none">
                <form id="catPro" method="post" action="">
                    <input type="hidden" name="cat_id" id="cat_id">
                </form>
                <button onclick="getCatProducts(<?php echo $category['cat_id']; ?>)" class="py-2 px-4 shadow-md proza rounded-full bg-white text-black text-xl border-red hover:text-white hover:bg-red-700 focus:outline-none active:shadow-none cursor-pointer active:bg-red-700 ">
                    <?php
                    echo $category['cat_title'];
                    ?>
                    <?php
                    $productsByCat = new ProductsController();
                    $productsByCat = $productsByCat->getProductsByCategory($category['cat_id']);
                    // echo count($productsByCat);
                    ?>
                </button>

            <?php
        endforeach;
            ?>
    </div>
    <section class="bg-green-50 pb-5 pt-5 ">
        <!-- <h1 class="text-5xl font-bold ink-free text-black text-center ">Our Products</h1> -->
        <section class="flex gap-4 md:gap-6 justify-center md:max-w-2xl lg:max-w-7xl mx-auto flex-wrap">
            <?php foreach ($products as $product) {  ?>
                <!-- loop through the products -->
                <div class="card p-6 bg-white">
                    <div>
                        <img src="<?php echo BASE_URL; ?>./public/uploads/<?= $product['product_image'] ?>" alt="image">
                    </div>
                    <div class="card-body flex flex-col items-center justify-center">
                        <h1 class="text-black font-bold text-2xl font-proza"><?= $product['product_title'] ?></h1>
                        <p class="text-black font-proza">Starting at <?= $product['product_price'] ?>$</p>
                    </div>
                    <div class="button flex gap-2 justify-center">

                        <a href="#"><img src="./public/img/add to cart.svg" alt="add to cart"></a>

                        <form id="form" method="post" action="<?php echo BASE_URL; ?>show">
                            <input type="hidden" name="product_id" id="product_id">
                        </form>

                        <a onclick="submitForm(<?php echo $product["product_id"]; ?>)" class="bg-red-600 hover:bg-red-900 text-white rounded-full w-2/3 text-center h-10 pt-2 cursor-pointer font-bold font-proza">SEE MORE</a>
                        <a href="#"><img src="./public/img/add to wishlist.svg" alt="add to wishlist"></a>
                    </div>
                </div>

            <?php } ?>

        </section>
    </section>


    <!-- footer -->
    <footer>
        <?php
        include './views/includes/footer.php';
        ?>
    </footer>

</body>

</html>

<!-- end footer -->