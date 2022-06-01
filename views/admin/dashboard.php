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
        <div class="col-md-4">
            <div class="card p-3 bg-danger">
                <div class="card-body">
                    <h3 class="card-text text-center">
                        <a href="<?php echo BASE_URL?>products" 
                        style="text-decoration:none;color:white;font-weight:bold">Produits</a>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 bg-primary">
                <div class="card-body">
                    <h3 class="card-text text-center">
                        <a href="<?php echo BASE_URL?>orders" 
                        style="text-decoration:none;color:white;font-weight:bold">Commandes</a>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>
