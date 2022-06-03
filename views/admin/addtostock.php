<?php 
  $data = new ProductsController();
  $prices = $data->getPricesValue();

  if(isset($_POST["submit"])){
      $code = new ProductsController();
      $code->newCode();
  }

echo '<pre>';
print_r($prices);
echo '</pre>';
die();
?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Ajouter un code
                    </h3>
                </div>
                <div class="card-body">
                    <form method="post" class="mr-1" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <select class="form-control" name="price_id" id="">
                                <?php foreach($prices as $price) : ?>
                                    <option value=""> 
                                        <?php echo $price->product_title ?> - price <?php echo $price->price ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                     
                        <div class="form-group">
                            <input type="text"
                            class="form-control"
                            name="code" placeholder="Code" id="">
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