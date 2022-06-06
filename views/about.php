<title>About</title>

<body>
    <!-- navbar -->
    <style>
        .mainabout {
            --tw-bg-opacity: 1;
            background-color: rgb(251 248 243 / var(--tw-bg-opacity));
            padding: 1vw 2vw 0 2vw;
        }

        li {
            color: #080808;
        }
    </style>
    <section class="mainabout">
            <?php
            include './views/includes/navbar.php';
            ?>

        <!-- end navbar -->

        <!-- component -->
        <div class="py-56 min-h-screen bg-[#FBF8F3]">
            <div class="container m-auto px-6  md:px-12 xl:px-6">
                <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12">
                    <div class="md:7/12 lg:w-6/12">
                        <h1 class="text-5xl font-bold text-[#080808] md:text-5xl font-ink">About US</h1>
                        <p class="mt-6 text-2xl text-[#080808] font-proza">Designed for customers who want the flexibility of buying, sending, and redeeming gift cards from their smartphone or desktop, our digital gift cards are a great way to support a friend, family member, or loved one.</p>
                        <p class="mt-4 text-2xl text-[#080808] font-proza">We accept all major credit cards—we truly believe that people should be able to choose what makes them happy.</p>
                    </div>
                    <div class="md:5/12 lg:w-5/12">
                        <img src="./public/img/gift.png" alt="image" loading="lazy" width="" height="">
                    </div>

                </div>
            </div>
        </div>
    </section>

</body>


<!-- footer -->
    <?php
    include './views/includes/footer.php';
    ?>
<!-- end footer -->

</html>