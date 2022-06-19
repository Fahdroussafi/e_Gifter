<?php

$user = new UsersController();
$wishlist = $user->ShowWishlist();

if (isset($_POST["remove"])) {
    $pid = $_POST["remove"];
    $user->unlike($pid);
}
?>
<title>Wishlist</title>
<style>
    .mainabout {
        padding: 1vw 2vw 0 2vw;
        --tw-bg-opacity: 1;
        background-color: rgb(251 248 243 / var(--tw-bg-opacity));
    }


    li {
        color: #080808;
    }
</style>
<section class="mainabout">
    <?php
    include './views/includes/navbar.php';
    ?>
    <?php
    include './views/includes/alerts.php';
    ?>
    <div class="flex justify-center py-16 font-ink text-5xl font-bold text-[#080808]">My Wishlist</div>
    <div class="relative overflow-x-auto sm:rounded-lg min-h-screen py-20">
        <table class="w-full text-base text-left text-[#080808]">
            <thead class="text-base text-[#080808] uppercase">

                <tr class="border-b border-black ">
                    <th scope="col" class="px-6 py-3">
                        Product Brand
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Remove from Wishlist
                    </th>
                    <th scope="col" class="px-6 py-3">
                        See More
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wishlist as $wish) : ?>
                    <tr class="border-b border-black ">
                        <td class="px-6 py-4 font-medium text-[#080808] whitespace-nowrap text-base sm-text-sm font-proza ">
                            <?php echo $wish['product_title']; ?>
                        </td>
                        <td class="px-6 py-4 text-base sm-text-sm text-[#080808]">
                            <img src="<?php echo BASE_URL; ?>./public/uploads/<?= $wish['product_image'] ?>" class="w-24" alt="image">
                        </td>
                        <td class="px-6 py-4 text-base sm-text-sm text-[#080808] font-proza ">
                            <?php echo $wish['cat_title']; ?>
                        </td>
                        <td class="px-6 py-4 ">
                            <form method="POST">
                                <input type="hidden" name="remove" value="<?= $wish['product_id'] ?>" />
                                <button type="submit" class="btn btn-circle bg-[#CC0000]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4">
                            <form id="form" method="post" action="<?php echo BASE_URL ?>show">
                                <input type="hidden" name="product_id" id="product_id">
                            </form>
                            <a onclick="submitForm(<?php echo $wish['product_id']; ?>)" class="btn btn-circle">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                        </td>
                    </tr>
            </tbody>
        <?php endforeach; ?>
        <?php if (empty($wishlist)) : ?>
            <tr class="border-b border-black ">
                <td class="px-6 py-4 font-medium text-[#080808] whitespace-nowrap text-base sm-text-sm font-proza ">
                    No products in wishlist
                </td>
            </tr> 
        <?php endif; ?>
        </table>
    </div>
</section>
</body>
<!-- footer -->

<?php
include './views/includes/footer.php';
?>
<!-- end footer -->