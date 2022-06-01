<?php
    if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true){
        $categories = new CategoriesController();
        $categories = $categories->getAllCategories();
        $productToUpdate = new ProductsController();
        $productToUpdate = $productToUpdate->getProduct();
        if(isset($_POST["submit"])){
            $product = new ProductsController();
            $product->updateProduct();
        }
    }else{
        Redirect::to("home");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/bc3854343b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.14.3/dist/full.css" rel="stylesheet" type="text/css" />
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link href="./views/src/output.css" rel="stylesheet">


</head>

<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Modifier un produit
                    </h3>
                </div>
                <div class="card-body">
                    <form method="post" class="mr-1" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text"
                            class="form-control"
                            name="product_title" 
                            required autocomplete="off" 
                            placeholder="Titre" 
                            value="<?php echo $productToUpdate->product_title;?>">
                        </div>
                        <div class="form-group">
                            <textarea row="5" cols="20" autocomplete="off" class="form-control" name="product_description" 
                            placeholder="Description" id=""><?php echo $productToUpdate->product_description;?></textarea>
                        </div>
                        <div class="form-group">
                            <textarea row="5" cols="20" autocomplete="off" class="form-control" name="short_desc" 
                            placeholder="Description Courte" id=""><?php echo $productToUpdate->short_desc;?></textarea>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="product_category_id" id="">
                                <?php foreach($categories as $category) :?>
                                    <option 
                                        <?php echo $productToUpdate->product_category_id === $category["cat_id"] ? "selected" : "";?>
                                        value="<?php echo $category["cat_id"]?>">
                                        <?php echo $category["cat_title"]?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" autocomplete="off" 
                            class="form-control" name="product_price" 
                            placeholder="Prix" 
                            value="<?php echo $productToUpdate->product_price;?>">
                        </div>
                        <div class="form-group">
                            <input type="number" autocomplete="off" 
                            class="form-control" name="old_price" 
                            placeholder="Ancien Prix" 
                            value="<?php echo $productToUpdate->old_price;?>">
                        </div>
                        <input type="hidden"
                            name="product_id" 
                            value="<?php echo $productToUpdate->product_id;?>">
                        <input type="hidden" name="product_current_image" 
                            value="<?php echo $productToUpdate->product_image;?>">
                        <div class="form-group">
                            <input type="number" autocomplete="off" 
                            class="form-control" name="product_quantity" 
                            placeholder="Quantité"  value="<?php echo $productToUpdate->product_quantity;?>">
                        </div>
                        <div class="form-group">
                            <img src="./public/uploads/<?php echo $productToUpdate->product_image;?>" width="400" height="400" alt="" class="img-fluid rounded">
                        </div>
                         <div class="form-group">
                            <input type="file"
                            class="form-control" name="image" >
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