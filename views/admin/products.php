<?php
  if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
    $data = new ProductsController();
    $products = $data->getAllProducts();
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
  <div class="row my-5">
    <div class="col-md-10 mx-auto">
        <div class="form-group">
            <a href="<?php echo BASE_URL?>addProduct" class="btn btn-primary btn-sm">
                Ajouter
            </a>
        </div>
        <form id="form" action="<?php echo BASE_URL?>updateProduct" method="post">
            <input type="hidden" name="product_id" id="product_id">
        </form>
        <form id="delete_form" action="<?php echo BASE_URL?>deleteProduct" method="post">
            <input type="hidden" name="delete_product_id" id="delete_product_id">
        </form>
        <div class="card bg-light p-3">
            <table class="table table-hover table-inverse">
                <h3 class="font-weight-bold">Produits</h3>
                <thead>
                    <tr>
                        <th>Libellé</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product) :?>
                    <tr>
                        <td><?php echo $product["product_title"];?></td>
                        <td><?php echo substr($product["product_description"],0,100);?></td>
                        <td>
                            <img width="50" height="50" 
                            src="./public/uploads/<?php echo $product["product_image"];?>"
                            alt="" class="img-fluid">
                        </td>
                        <td class="d-flex flex-row justify-content-center align-items-center">
                            <a onclick="submitForm(<?php echo $product['product_id'];?>)" class="btn btn-warning btn-sm mr-1">
                                Modifier
                            </a>
                            <a onclick="deleteForm(<?php echo $product['product_id'];?>)" class="btn btn-danger btn-sm">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>