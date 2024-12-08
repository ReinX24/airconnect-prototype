<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <div class="card mb-3">
        <div class="card-body">
            <form action="" method="POST" class="mb-2">
                <button class="btn btn-success">Place Order</button>
            </form>
            <h2 class="my-4">Total: <?= $totalCost; ?></h2>
        </div>
    </div>
    <?php foreach ($selectedItems as $item) : ?>
        <div class="card mb-3">
            <div class="d-flex">
                <div>
                    <img src="<?= $item["photo"] ?>" class="card-img-top" alt="<?= $item["product_name"] ?>-photo" style="width: 14rem;">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title"><?= $item["product_name"] ?></h5>
                            <div>
                                <p class="card-text lead">
                                    Quantity: <?= $item["quantity"] ?>
                                    <br>
                                    Price: <?= $item["product_price"] ?>
                                    <br>
                                </p>
                                <h4 class="my-4">Total: <?= $item["totalItemCost"] ?></h4>
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
</div>

<?php require basePath('views/partials/footer.php'); ?>