<?php
$categories = new CategoriesController();
$categories = $categories->getAllCategories();
if (isset($_POST["cat_id"])) {
    $products = new ProductsController();
    $products = $products->getProductsByCategory($_POST['cat_id']);
} else {
    $data = new ProductsController();
    $products = $data->getAllProducts(); // get all products from database and store in $products array variable
}

// if (isset($_POST["add"])) {
//   var_dump($_POST["product_id"]);
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/bc3854343b.js" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link href="./views/src/output.css" rel="stylesheet">
    <script src="./public/js/main.js"></script>

   

</head>
<?php
    include('./views/includes/alerts.php')
?>

<body class="bg-[#f5f5f5]">
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
    </style>
    <section class="mainabout">
        <header>
            <?php
            include './views/includes/navbar.php';
            ?>
        </header>
    </section>

    <!-- end navbar -->

    <section class="bg-black my-5 flex flex-wrap">
        <img src="./public/img/giftcard.png" class="flex justify-start" alt="gift card">
        <h1 class="text-white font-ink text-5xl m-auto py-10 px-5 flex justify-center">Our Products</h1>
    </section>



    <div class="flex gap-5 justify-center py-16 flex-wrap ">

        <a href="<?php echo BASE_URL; ?>productslist" class="py-2 px-4 shadow-md proza rounded-full bg-white text-black text-2xl border-red hover:text-white hover:bg-red-700 focus:outline-none active:shadow-none cursor-pointer active:bg-red-700 font-proza duration-500"> All</a>

        <?php
        foreach ($categories as $category) :
        ?>
            <li class="list-none">
                <form id="catPro" method="post" action="<?php echo BASE_URL ?>productslist">
                    <input type="hidden" name="cat_id" id="cat_id">
                </form>
                
                <button onclick="getCatProducts(<?php echo $category['cat_id']; ?>)" class="py-2 px-4 shadow-md proza rounded-full bg-white text-black text-2xl border-red hover:text-white hover:bg-red-700 focus:outline-none active:shadow-none cursor-pointer active:bg-red-700 font-proza duration-500">
                    <?php
                    echo $category['cat_title'];
                    ?>
                    <?php
                    // $productsByCat = new ProductsController();
                    // $productsByCat = $productsByCat->getProductsByCategory($category['cat_id']);
                    // echo count($productsByCat);
                    ?>
                </button>
            </li>
        <?php
        endforeach;
        ?>
    </div>
    <section class="pb-5 pt-5 ">
        <section class="flex gap-4 md:gap-6 justify-center md:max-w-2xl lg:max-w-7xl mx-auto flex-wrap">
            <?php foreach ($products as $product) : ?>
                <div class="card p-6 bg-white shadow-lg hover:shadow-2xl duration-500 ease-in-out mb-20">
                    <div>
                        <img src="<?php echo BASE_URL; ?>./public/uploads/<?= $product['product_image'] ?>" alt="image">
                    </div>
                    <div class="card-body flex flex-col items-center justify-center">
                        <h1 class="text-black font-bold text-2xl font-proza"><?= $product['product_title'] ?></h1>
                        <p class="text-black font-proza">Starting at 10 $</p>
                    </div>
                    <div class="button flex gap-2 justify-center">

                        <!-- <a href="#"><img src="./public/img/add to cart.svg" alt="add to cart"></a> -->

                        <form id="form" method="post" action="<?php echo BASE_URL ?>show">
                            <input type="hidden" name="product_id" id="product_id">
                        </form>

                        <a onclick="submitForm(<?php echo $product['product_id']; ?>)" class="bg-red-600  text-white rounded-full w-2/3 text-center h-10 pt-2 cursor-pointer font-bold font-proza duration-500 ease-in-out hover:scale-95 ">SEE MORE</a>

                     

                    </div>
                </div>

            <?php endforeach; ?>

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