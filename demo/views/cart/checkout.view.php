<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <div class="card mb-3">
        <div class="card-body">
            <button type="submit" class="btn btn-success" form="checkoutForm">Place Order</button>
            <h2 class="my-4">Total: ₱<?= formatPrice($totalCost); ?></h2>
        </div>
    </div>

    <form action="/checkout-confirm" method="POST" class="mb-2" id="checkoutForm">
        <?php foreach ($selectedItems as $item) : ?>
            <input type="hidden" name="cartItemIds[]" value="<?= $item["id"] ?>">
            <div class="card mb-3">
                <div class="d-flex">
                    <div>
                        <img src="<?= $item["photo"] ?>" class="card-img-top" alt="<?= $item["product_name"] ?>-photo" style="width: 14rem;">
                        <div class="card-body">
                            <div>
                                <h5 class="card-title"><?= $item["product_name"] ?></h5>
                                <div>
                                    <p class="card-text lead">Price: ₱<?= formatPrice($item["product_price"]) ?></p>
                                    <p class="card-text lead">Quantity: <?= $item["quantity"] ?></p>
                                    <!-- <p class="card-text lead"><strong>Total: ₱<?= formatPrice($item["product_price"] * $item["quantity"]) ?></strong></p> -->
                                    <h4 class="my-4">Total: ₱<?= formatPrice($item["totalItemCost"]) ?></h4>
                                </div>
                                <div class="mt-2 d-flex gap-2">
                                    <a href="/product?id=<?= $item["product_id"] ?>" class="btn btn-primary">Product Info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </form>
</div>

<?php require basePath('views/partials/footer.php'); ?>