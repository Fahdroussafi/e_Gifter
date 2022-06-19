<div class='w-full'>
    <nav class="px-2 sm:px-4 py-2.5">
        <div class="flex justify-between flex-wrap">
            <div class=" sm:px-4 py-2.5">
                <a  href="<?php echo BASE_URL;?>">
                    <img src="./public/img/logo.png" alt="logo">
                </a>
            </div>

            <ul class="lg:w-8/12 flex font-sans font-bold text-xl items-center text-[#FBF8F3] justify-center space-x-8 flex-wrap list-none">
                <li><a class="hidden md:flex hover:text-[#CC0000] duration-500 font-proza" href="<?php echo BASE_URL; ?>">Home</a>
                </li>
                <li>
                    <a class="hidden md:flex hover:text-[#CC0000] duration-500 font-proza" href="<?php echo BASE_URL; ?>about">About</a>
                </li>
                <li>
                    <a class="hidden md:flex hover:text-[#CC0000] duration-500 font-proza" href="<?php echo BASE_URL; ?>productslist">Products</a>
                </li>
                <li>
                    <a class="hidden md:flex hover:text-[#CC0000] duration-500 font-proza" href="<?php echo BASE_URL; ?>contact">Contact</a>
                </li>
            </ul>


            <ul class="px-2 sm:px-4 py-2.5  md:px-4">
                <?php if (!isset($_SESSION["logged"])) : { ?>
                        <button tabindex="0">
                            <div class="w-10 rounded-full">
                                <a href="<?php echo BASE_URL; ?>login">
                                    <img src="./public/img/user2.png">
                                </a>
                            </div>
                        </button>
                    <?php }
                else : { ?>
                        <!-- <span class="text-[#FBF8F3]"></span> -->
                        <div class="dropdown dropdown-end">
                            <button tabindex="0">
                                <div class="w-10 rounded-full">
                                    <img src="./public/img/user2.png">
                                </div>
                            </button>
                            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow text-[#FBF8F3] bg-base-100 rounded-box w-52">
                                <li class="text-[#FBF8F3] text-center font-proza font-bold">
                                    <?php echo $_SESSION["fullname"]; ?>
                                    <a href="<?php echo BASE_URL; ?>myprofile" class="justify-between hover:text-[#CC0000] font-proza font-bold">
                                        My Profile
                                    </a>
                                </li>
                                <li class="text-[#FBF8F3] hover:text-[#CC0000] font-proza font-bold sm:text-sm"><a href="<?php echo BASE_URL; ?>userorders">My Orders</a></li>
                                <li class="text-[#FBF8F3] hover:text-[#CC0000] font-proza font-bold sm:text-sm"><a href="<?php echo BASE_URL; ?>likes">Wishlist</a></li>
                                <li class="text-[#FBF8F3] hover:text-[#CC0000] font-proza font-bold sm:text-sm "><a href="<?php echo BASE_URL; ?>logout">Log out</a></li>
                            </ul>
                        </div>

                    <?php } ?>
                <?php endif; ?>

                <!-- <div class="sm:flex-none"> -->
                    <div class="dropdown dropdown-end">
                        <button tabindex="0" class="rounded-full">
                            <img src="./public/img/shoppping.png" alt="shopping-cart">
                        </button>

                        <div tabindex="0" class="mt-3 card card-compact dropdown-content w-52 bg-base-100 shadow">
                            <div class="card-body">
                                <div class="card-actions">
                                    <a class="btn btn-block sm:text-sm" href="<?php echo BASE_URL; ?>cart">View cart
                                    <?php if (isset($_SESSION["count"]) && $_SESSION["count"] > 0 ) : ?>
                                       (<?php echo $_SESSION["count"]; ?>)
                                       <?php else : ?>
                                            (0)
                                    <?php endif; ?>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
            </ul>
        </div>
        <div class="md:hidden flex items-center md:flex-wrap md:justify-center md:items-center px-2 sm:px-4 py-2.5 ">
            <button class="outline-none mobile-menu-button">
                <svg class="w-6 h-6" x-show="!showMenu" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </nav>
    <!-- Mobile menu -->
    <div class="hidden mobile-menu">
        <ul class="">
            <li><a href="<?php echo BASE_URL; ?>" class="block text-sm px-2 py-4 hover:bg-[#CC0000] font-proza transition duration-500">Home</a></li>
            <li><a href="<?php echo BASE_URL; ?>about" class="block text-sm px-2 py-4  hover:bg-[#CC0000] font-proza transition duration-500">About</a></li>
            <li><a href="<?php echo BASE_URL; ?>productslist" class="block text-sm px-2 py-4 hover:bg-[#CC0000] font-proza transition duration-500">Products</a></li>
            <li><a href="<?php echo BASE_URL; ?>contact" class="block text-sm px-2 py-4 hover:bg-[#CC0000] font-proza transition duration-500">Contact Us</a></li>
        </ul>
    </div>


    <!--- End Navbar -->

    <script>
        // Grab HTML Elements
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        // Add Event Listeners
        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");

        });
    </script>