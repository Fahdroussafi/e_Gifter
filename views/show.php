<?php

$data = new ProductsController();
$product = $data->getProduct();
// var_dump($product);
$value = $data->getValue();
// var_dump($value);
// die;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product INFORMATIONS</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/bc3854343b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.14.3/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link href="./views/src/output.css" rel="stylesheet">

</head>


<div class="container">
    <div class="row my-5">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="card h-100 bg-white rounded p-2">
                        <div class="card-header bg-light">
                            <h3 class="text-black">
                                <?php
                                echo $product->product_title;
                                ?>
                            </h3>
                        </div>
                        <div class="card-img-top">
                            <img width="" src="./public/uploads/<?php echo $product->product_image; ?>" alt="" class="img-fluid rounded">
                        </div>
                        <div class="card-body">
                            <p class="text-black">
                                <?php
                                echo $product->short_desc;
                                ?>
                            </p>
                        </div>
                        <!-- <div class="card-footer">
                            <span class="badge badge-danger p-2">
                                <?php
                                echo $product->product_price;
                                ?>dh
                            </span>

                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="text-white m-3 text-center">
                Qté :
                <?php echo $product->product_quantity; ?>

            </h3>
            <form method="post" action="<?php echo BASE_URL; ?>checkout">
                <div class="form-group">
                    <input type="number" name="product_qte" id="product_qte" class="text-black" value="1">
                    <input type="hidden" name="product_title" value="<?php echo $product->product_title; ?>">
                    <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">

                    <select name="product_price" id="product_price" class="text-white bg-black">
                        <?php
                        foreach ($value as $values) {

                            echo '<option value="' . $values->price_value . '">' . $values->price_value . '</option>';
                        }
                        ?>
                    </select>


                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Ajouter au panier">
                </div>
            </form>
        </div>
    </div>
</div>