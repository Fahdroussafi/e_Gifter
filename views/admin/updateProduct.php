<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true) {
    $categories = new CategoriesController();
    $categories = $categories->getAllCategories();
    $productToUpdate = new ProductsController();
    $productToUpdate = $productToUpdate->getProduct();
    if (isset($_POST["submit"])) {
        $product = new AdminController();
        $product->updateProduct();
    }
} else {
    Redirect::to("home");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <title>Update Product</title>
</head>

<body class="font-proza">
    <!-- component -->
    <div>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

            <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class=" fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-[#CC0000] overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
                <div class="flex items-center justify-center mt-8">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-columns-gap" viewBox="0 0 16 16">
                            <path d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z" />
                        </svg>

                        <span class="text-white text-2xl mx-2 font-semibold">Update Product</span>
                    </div>
                </div>

                <nav class="mt-10">
                    <a class="flex items-center mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="<?php echo BASE_URL; ?>dashboard">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                        </svg>

                        <span class="mx-3">Dashboard</span>
                    </a>

                    <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-200 hover:text-amber-100" href="<?php echo BASE_URL; ?>products">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                            </path>
                        </svg>

                        <span class="mx-3">Products</span>
                    </a>

                    <a class="flex items-center mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="<?php echo BASE_URL; ?>categories">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>

                        <span class="mx-3">Categories</span>
                    </a>

                    <a class="flex items-center mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="<?php echo BASE_URL; ?>clients">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg>
                        <!-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg> -->

                        <span class="mx-3">Clients</span>
                    </a>
                    <a class="flex items-center mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="<?php echo BASE_URL; ?>addprices">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        <span class="mx-3">Add to stock</span>
                    </a>
                </nav>
            </div>
            <div class="flex-1 flex flex-col overflow-hidden">
                <header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-amber-800">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = true" class="text-[#080808] focus:outline-none lg:hidden">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center">

                        <h5 class="text-base font-semibold text-[#080808] mr-2"><?php echo $_SESSION["username"] ?></h5>
                        <div x-data="{ dropdownOpen: false }" class="relative">
                            <button @click="dropdownOpen = ! dropdownOpen" class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                                <img class="h-full w-full object-cover" src="./public/img/user2.png" alt="Your avatar">
                            </button>

                            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>

                            <div x-show="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10" style="display: none;">
                                <a href="#" class="block px-4 py-2 text-sm text-[#080808] hover:bg-[#CC0000] hover:text-white"><?php echo $_SESSION["username"] ?></a>
                                <a href="<?php echo BASE_URL; ?>logout" class="block px-4 py-2 text-sm text-[#080808] hover:bg-[#CC0000] hover:text-white">Logout</a>
                            </div>
                        </div>
                    </div>
                </header>




                <!-- update product form -->
                <div class="flex items-center justify-center overflow-scroll">
                    <div class="mx-auto w-full max-w-[550px] mb-20 mt-20">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-5 mt-20">
                                <label for="Product Title" class=" block text-base font-medium text-[#07074D]">
                                    Product Title
                                </label> 
                                <input type="text" name="product_title" value="<?php echo $productToUpdate->product_title; ?>" placeholder="Product Title" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="mb-5">
                                <label for="Product Description" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Product Description
                                </label>
                                <textarea row="5" cols="20" name="product_description"  placeholder="Product Description" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"><?php echo $productToUpdate->product_description; ?></textarea>
                            </div>
                            <div class="mb-5">
                                <label for="Short Description" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Short Description
                                </label>
                                <textarea row="5" cols="20" name="short_desc"  placeholder="Short Description" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"><?php echo $productToUpdate->short_desc; ?></textarea>
                            </div>
                            <div class="mb-5">
                                <label for="Category" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Category
                                </label>
                                    <select class="select w-full max-w-xs bg-white" name="product_category_id" id="">
                                        <?php foreach ($categories as $category) : ?>
                                            <option <?php echo $productToUpdate->product_category_id === $category["cat_id"] ? "selected" : ""; ?> value="<?php echo $category["cat_id"] ?>">
                                                <?php echo $category["cat_title"] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                            </div>
                            <div class="mb-5">
                                <input type="hidden" name="product_id" value="<?php echo $productToUpdate->product_id; ?>">
                                <input type="hidden" name="product_current_image" value="<?php echo $productToUpdate->product_image; ?>">
                                <img src="./public/uploads/<?php echo $productToUpdate->product_image; ?>" width="400" height="400" alt="" class="img-fluid rounded">

                                <label for="Image" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Image
                                    <div class="mb-5">
                                    <input type="file" name="image">
                                    </div>
                                </label>
                            </div>
                            <div>
                                <button name="submit" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>