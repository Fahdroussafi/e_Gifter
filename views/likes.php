<?php
// $data = new ProductsController();
// $products = $data->getAllProducts();
$user = new UsersController();
$wishlist = $user->ShowWishlist();
// echo "<pre>";
// print_r($wishlist);
// echo "</pre>";

if (isset($_POST["remove"])) {
    $pid = $_POST["remove"];
    $user->unlike($pid);
}
?>
<title>Wishlist</title>
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
    <?php
    include './views/includes/alerts.php';
    ?>
    <div class="relative overflow-x-auto sm:rounded-lg min-h-screen py-20">
        <table class="w-full text-sm text-left text-[#080808]">
            <thead class="text-base text-[#080808]  uppercase bg-[##080808]">

                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>

                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Remove</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wishlist as $wish) : ?>
                    <tr class=" border-b border-black p-0  rounded">
                        <th scope="row" class="px-6 py-4 font-medium text-[##080808] whitespace-nowrap text-base sm-text-sm font-proza">
                            <?php echo $wish['product_title']; ?>
                        </th>
                        <td class="px-6 py-4 text-base sm-text-sm font-proza">
                            <img src="<?php echo BASE_URL; ?>./public/uploads/<?= $wish['product_image'] ?>" class="w-20" alt="image">
                        </td>
                        <td class="px-6 py-4 text-base sm-text-sm font-proza text-[##080808] ">
                            <?php echo $wish['cat_title']; ?>
                        </td>
                        <td class="px-6 py-4 text-base text-right sm-text-sm font-proza">
                            <form method="POST">
                                <input type="hidden" name="remove" value="<?= $wish['product_id'] ?>" />
                                <button type="submit" class="btn btn-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
            </tbody>
        <?php endforeach; ?>

        </table>
    </div>
</section>
</body>
<!-- footer -->

<?php
include './views/includes/footer.php';
?>
<!-- end footer -->