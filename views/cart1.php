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

                    </tbody>
                    <?php foreach ($_SESSION as $name => $product) : ?>
                        <?php if (substr($name, 0, 9) == "products_") : ?>
                            <tr>
                                <td><?php echo $product["title"]; ?></td>
                                <td><?php echo $product["selectedPrice"]; ?></td>
                                <td><?php echo $product["qte"]; ?></td>
                                <td><?php echo $product["total"]; ?> $</td>
                                <td>
                                    <form method="post" action="<?php echo BASE_URL; ?>cancelcart">
                                        <input type="hidden" name="product_id" value="<?php echo $product["id"]; ?>">
                                        <input type="hidden" name="product_price" value="<?php echo $product["total"]; ?>">
                                        <button type="submit" class="btn btn-sm btn-danger text-white font-weight-bold p-1">
                                            &times;
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if (isset($_SESSION["count"]) && $_SESSION["count"] > 0 && isset($_SESSION["logged"])) : ?>
                    <div id="paypal-button-container"></div>
                <?php elseif (isset($_SESSION["count"]) && $_SESSION["count"] > 0) : ?>
                    <a href="<?php echo BASE_URL; ?>login" class="btn btn-link">Connectez vous pour terminer vos achats</a>
                <?php endif; ?>
            </div>
            <div class="col-4 col-md-4 float-right bg-white">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Produits</th>
                            <td>
                                <?php if (isset($_SESSION["count"])) : ?>
                                    <?php echo $_SESSION["count"]; ?>
                                <?php else : ?>
                                    0
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Total TTC</th>
                            <td>
                                <strong id="amount" data-amount="<?php echo $_SESSION["totaux"];?>">
                                    <?php echo isset($_SESSION["totaux"]) ? $_SESSION["totaux"] : 0; ?> <span class="bb-danger">$</span>
                                </strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php if (isset($_SESSION["count"]) && $_SESSION["count"] > 0) : ?>
                    <form method="post" action="<?php echo BASE_URL; ?>emptycart">
                        <button type="submit" class="btn btn-primary">
                            Vider le panier
                        </button>
                    </form>
                    <form method="post" id="addOrder" action="<?php echo BASE_URL; ?>addOrder">
                        <button class="p-2 bg-blue-600 text-black" type="submit">Buy</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>