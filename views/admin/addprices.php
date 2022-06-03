<?php 
    $products = new ProductsController();
    $products = $products->getAllProducts();
    if(isset($_POST["submit"])){
        $product = new ProductsController();
        $product->newPrice();
    }
// echo '<pre>';
// print_r($products);
// '</pre>';
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Ajouter un prix
                    </h3>
                </div>
                <div class="card-body">
                    <form method="post" class="mr-1" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <select class="form-control" name="product_id" id="">
                                <?php foreach($products as $product) :?>
                                    <option value="<?php echo $product["product_id"]?>">
                                        <?php echo $product["product_title"]?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text"
                            class="form-control"
                            name="price" required autocomplete="off" placeholder="Price" id="">
                        </div>
                        <div class="form-group">
                            <input type="text"
                            class="form-control"
                            name="quantity" required max="10" placeholder="Quantity" id="">
                        </div>
                     
                        <div class="form-group">
                            <button name="submit" class="btn btn-primary">
                                Valider
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>