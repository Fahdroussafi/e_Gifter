<?php

$data = new ProductsController();
$product = $data->getProduct();
// echo '<pre>';
// var_dump($product);
// echo '</pre>';
$value = $data->getValue();
// echo '<pre>';
// print_r($value);
// echo '</pre>';
// die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product INFORMATIONS</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/bc3854343b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.14.3/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link href="./views/src/output.css" rel="stylesheet">

</head>

<body>
    <style>
        .mainabout {
            /* background: gray; */
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
                                <span class="font-bold text-5xl leading-none align-baseline text-black"> <?php echo $product->product_price; ?> </span>
                                <!-- <span class="text-2xl leading-none align-baseline text-black">.99</span> -->
                            </div>
                            <div class="inline-block align-bottom">

                           
                            <form method="post" action="<?php echo BASE_URL; ?>checkout">
                                    <div class="form-group">
                                        <input type="number" name="product_qte" id="product_qte" class="text-black border-2 border-black rounded-lg pt-1 shadow-lg bg-white" value="1">
                                        <input type="hidden" name="product_title" value="<?php echo $product->product_title; ?>">
                                        <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
                                        <button class="bg-red-600 text-white rounded-full text-center duration-500 ease-in-out hover:scale-95 px-10 py-2 font-semibold"><i class="mdi mdi-cart -ml-2 mr-2"></i> BUY NOW</button>
                                    </div>

                                    <select name="product_price" id="product_price" class="text-black border-2 border-emerald-600 ">
                                        <?php
                                        foreach ($value as $values) {

                                            echo '<option class="text-black" value="' . $values->price_value . '">' . $values->price_value . ' </option>' ;
                                        }
                                        ?>
                                        
                                    </select>
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
</body>
