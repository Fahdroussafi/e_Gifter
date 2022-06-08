<?php
    if (isset($_POST["update"])) 
    {
        $data = new UsersController();
        $data = $data->updateUser();
    }
?>
<title>My Profile</title>

<section class="main">

    <?php
    include './views/includes/navbar.php';
    ?>

    <!-- end navbar -->
    <?php
    include('./views/includes/alerts.php')
    ?>

    <div class="flex items-center min-h-screen">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto my-10 p-5 rounded-md shadow-sm bg-[#FBF8F3]">
                <div class="text-center">
                    <h1 class="my-3 text-5xl font-semibold text-[#080808] font-ink">Update Profile</h1>
                </div>
                <div class="m-7">
                    <form method="POST">

                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-xl font-proza text-[#080808]">Full Name</label>
                            <input type="text" name="fullname" placeholder="Your Name" required class="w-full px-3 py-2 border border-[#080808] rounded-md focus:outline-none dark:bg-gray-700" />
                        </div>
                        <div class="mb-6">
                            <label for="username" class="block mb-2 text-xl font-proza text-[#080808]">Username</label>
                            <input type="text" name="username" placeholder="Your Username" required class="w-full px-3 py-2 border border-[#080808] rounded-md focus:outline-none dark:bg-gray-700" />
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-xl font-proza text-[#080808]">Email Address</label>
                            <input type="email" name="email" placeholder="Your Email" required class="w-full px-3 py-2 border border-[#080808] rounded-md focus:outline-none dark:bg-gray-700" />
                        </div>
                        <div class="mb-6">
                            <button type="submit" name="update" class="bg-[#CC0000] text-[#FBF8F3] rounded-full w-full h-10 cursor-pointer font-bold font-proza duration-500 ease-in-out hover:scale-95">Update</button>
                        </div>

                    </form>
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