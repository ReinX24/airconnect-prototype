<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <div class="alert alert-info fs-5" role="alert">
        You should clean your air conditioner/s at least once every 12 months!
    </div>
    <?php foreach ($purchases as $item) : ?>
        <div class="card mb-3">
            <div class="d-flex">
                <div>
                    <div class="card-body">
                        <div>
                            <h5 class="card-title"><?= $item["product_name"] ?></h5>
                            <div>
                                <p class="card-text lead">
                                    Quantity: <?= $item["quantity"] ?>
                                </p>
                                <p class="fs-5 lead">
                                    <!-- Less than 3 months -->
                                    <?php if (strtotime($item["created_at"]) > strtotime("-3 months")) : ?>
                                        Purchase Date: <strong class="text-success"><?= date("m-d-Y", strtotime($item["created_at"])) ?></strong>
                                        <!-- Less than 6 months -->
                                    <?php elseif (strtotime($item["created_at"]) > strtotime("-6 months")) : ?>
                                        Purchase Date: <strong class="text-warning"><?= date("m-d-Y", strtotime($item["created_at"])) ?></strong>
                                        <!-- Less than 1 year -->
                                    <?php elseif (strtotime($item["created_at"]) > strtotime("-1 year")) : ?>
                                        Purchase Date: <strong class="text-warning"><?= date("m-d-Y", strtotime($item["created_at"])) ?></strong>
                                    <?php else : ?>
                                        <!-- More than 1 year -->
                                        Purchase Date: <strong class="text-danger"><?= date("m-d-Y", strtotime($item["created_at"])) ?></strong>
                                    <?php endif ?>
                                </p>
                            </div>
                            <div class="mt-2 d-flex gap-2">
                                <a href="/product?id=<?= $item["product_id"] ?>" class="btn btn-primary">Product Info</a>
                                <form action="/maintenance/ticket" method="GET">
                                    <input type="hidden" name="product_id" value="<?= $item["product_id"] ?>">
                                    <input type="hidden" name="product_name" value="<?= $item["product_name"] ?>">
                                    <input type="hidden" name="purchase_date" value="<?= $item["created_at"] ?>">
                                    <button href="/maintenance/ticket" class="btn btn-success">Contact Maintenance</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?php require basePath('views/partials/footer.php'); ?>