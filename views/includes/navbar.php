<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/daisyui@2.14.3/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>

<div class='w-full'>
    <nav class="relative px-6">
        <div class="flex items-center justify-between flex-wrap">
            <div class="flex-wrap"><img src="<?php echo BASE_URL; ?>./public/img/logo.png" alt="logo"></div>

            <ul class="w-8/12 flex font-sans  text-xl items-center text-white justify-center space-x-8 flex-wrap">
                <li><a class="hover:text-[#ff5252] " href="<?php echo BASE_URL; ?>">Home</a>
                </li>
                <li>
                    <a class="hover:text-[#fd5f5f]" href="<?php echo BASE_URL; ?>about">About</a>
                </li>
                <li>
                    <a class="hover:text-[#fd5f5f] " href="<?php echo BASE_URL; ?>productslist">Products</a>
                </li>
                <li>
                    <a class="hover:text-[#ff5252]" href="<?php echo BASE_URL; ?>contact">Contact</a>
                </li>
            </ul>


            <ul>
                <?php if (!isset($_SESSION["logged"])) : { ?>
                        <button tabindex="0" class="flex-wrap">
                            <div class="w-10 rounded-full">
                                <a href="<?php echo BASE_URL; ?>login">
                                    <img src="https://media.discordapp.net/attachments/922798224199266344/977949376955703406/guest-48.png">
                                </a>
                            </div>
                </button>
                    <?php }
                else : { ?>
                        <span class="text-white ">

                        </span>
                        <div class="dropdown dropdown-end">
                            <button tabindex="0" class=" flex-wrap">
                                <div class="w-10 rounded-full">
                                    <img src="./public/img/user.png">
                                </div>
                            </button>
                            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow text-white bg-base-100 rounded-box w-52">
                                <li class="text-white text-center">
                                    <?php echo $_SESSION["fullname"]; ?>
                                    <a href="<?php echo BASE_URL; ?>/user" class="justify-between hover:text-red-800">
                                        My Profile
                                    </a>
                                </li>
                                <li class="text-white hover:text-red-800 "><a href="<?php echo BASE_URL; ?>orders">My Orders</a></li>
                                <li class="text-white hover:text-red-800 "><a href="<?php echo BASE_URL; ?>likes">Wishlist</a></li>
                                <li class="text-white hover:text-red-800"><a href="<?php echo BASE_URL; ?>logout">Log out</a></li>
                            </ul>
                        </div>

                    <?php } ?>
                <?php endif; ?>

                <div class="inline-block ml-3 flex-wrap">
                    <div class="dropdown dropdown-end">
                        <button tabindex="0" class="rounded-full bg-black flex-wrap">
                            <div class="items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="max-h-36 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <!-- <span class="badge badge-sm indicator-item">8</span> -->
                            </div>
                        </button>

                        <div tabindex="0" class="mt-3 card card-compact dropdown-content w-52 bg-base-100 shadow">
                            <div class="card-body">
                                <span class="font-bold text-lg text-white">8 Items</span>
                                <span class="text-info">Subtotal: $999</span>
                                <div class="card-actions">
                                    <a class="btn btn-block " href="<?php echo BASE_URL; ?>cart">View cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </ul>
    </nav>
</div>
</div>


<!--- End Navbar -->