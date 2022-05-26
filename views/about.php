<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="http://fonts.cdnfonts.com/css/proza-libre" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bc3854343b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.14.3/dist/full.css" rel="stylesheet" type="text/css" />
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link href="./views/src/output.css" rel="stylesheet">

</head>

<body>
    <!-- navbar -->
    <style>
        .mainabout {
            background: #fff;
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
        <header>

            <?php
            include './views/includes/navbar.php';
            ?>
        </header>

        <!-- end navbar -->

        <!-- component -->
        <div class="py-16 bg-white">
            <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
                <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12">
                    <div class="md:7/12 lg:w-6/12">
                        <h1 class="text-5xl font-bold text-black md:text-5xl ink">About US</h1>
                        <p class="mt-6 text-2xl text-black font-proza">Gift Cards are a quick and flexible way to give someone exactly what they want - whether it's for a birthday, holiday, graduation, wedding, or any other special occasion.</p>
                        <p class="mt-4 text-2xl text-black font-proza"> There are two types of Gift Cards that you can purchase - eGift Cards and Digital Gift Cards.</p>
                    </div>
                    <div class="md:5/12 lg:w-5/12">
                        <img src="./public/img/gift.png" alt="image" loading="lazy" width="" height="">
                    </div>

                </div>
            </div>
        </div>
    </section>



    <!-- footer -->
    <footer>
        <?php
        include './views/includes/footer.php';
        ?>
    </footer>
    <!-- end footer -->

</body>

</html>