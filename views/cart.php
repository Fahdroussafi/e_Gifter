<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/navbar.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/bc3854343b.js" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@2.14.3/dist/full.css" rel="stylesheet" type="text/css" /> -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

    <script src="https://www.paypal.com/sdk/js?client-id=AQv4lsU6qXNa1XCpCZRtvK6aIPTBC-YPx59giDKGlXWvKDPZRze6oNcrrdXIIFbO7ayGMh_W9MzuSalJ&components=buttons"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- <link href="./views/src/output.css" rel="stylesheet"> -->

</head>
<?php 
// echo '<pre>';
// var_dump($_SESSION);
// echo'</pre>';
?>

<body>
<a href="<?php echo BASE_URL ?>productslist">Back</a>

<div class="container">

    <div class="row">
        <div class="col-md-8 bg-white">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($_SESSION as $name => $product) :?> 
                    <?php if(substr($name,0,9) == "products_"):?> 
                    <tr>
                        <td><?php echo $product["title"];?></td>
                        <td><?php echo $product["price"];?></td>
                        <td><?php echo $product["qte"];?></td>
                        <td><?php echo $product["total"];?> $</td>
                        <td>
                            <form method="post" action="<?php echo BASE_URL;?>cancelcart">
                                <input type="hidden" name="product_id" value="<?php echo $product["id"];?>">
                                <input type="hidden" name="product_price" value="<?php echo $product["total"];?>">
                                <button type="submit" class="btn btn-sm btn-danger text-white font-weight-bold p-1">
                                    &times;
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endif;?> 
                    <?php endforeach;?> 
                </tbody>
            </table> 
                <?php if(isset($_SESSION["count"]) && $_SESSION["count"] > 0 && isset($_SESSION["logged"])):?>
                    <div id="paypal-button-container"></div>
                <?php elseif(isset($_SESSION["count"]) && $_SESSION["count"] > 0):?>
                    <a href="<?php echo BASE_URL;?>login" class="btn btn-link">Connectez vous pour terminer vos achats</a>
                <?php endif;?> 
        </div>
        <div class="col-4 col-md-4 float-right bg-white">
           <table class="table table-bordered">
               <tbody>
                   <tr>
                       <th scope="row">Produits</th>
                       <td>
                        <?php echo isset($_SESSION["count"]) ? $_SESSION["count"] : 0;?>
                       </td>
                   </tr>
                   <tr>
                       <th scope="row">Total TTC</th>
                       <td>
                            <strong id="amount" data-amount="<?php echo $_SESSION["totaux"];?>">
                                <?php echo isset($_SESSION["totaux"]) ? $_SESSION["totaux"] : 0;?> <span class="bb-danger">dh</span>
                            </strong>
                       </td>
                   </tr>
               </tbody>
           </table>
            <?php if(isset($_SESSION["count"]) && $_SESSION["count"] > 0):?>
                <form method="post" action="<?php echo BASE_URL;?>emptycart">
                    <button type="submit" class="btn btn-primary">
                        Vider le panier
                    </button>
                </form>
                <form method="post" id="addOrder" action="<?php echo BASE_URL;?>addOrder"></form>
            <?php endif;?> 
        </div>
    </div>
</div>
</body>

<script>
    paypal.Buttons({
  style: {
    layout: 'vertical',
    color:  'blue',
    shape:  'rect',
    label:  'paypal'
  }
}).render('#paypal-button-container');
</script>
