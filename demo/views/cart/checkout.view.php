<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <?php foreach ($selectedItems as $item) : ?>
        <div class="card mb-3">
            <div class="d-flex">
                <div>
                    <img src="<?= $item["photo"] ?>" class="card-img-top" alt="<?= $item["name"] ?>-photo" style="width: 14rem;">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title"><?= $item["name"] ?></h5>
                            <div>
                                <p class="card-text lead">Quantity: <?= $item["quantity"] ?></p>
                            </div>
                            <div class="mt-2 d-flex gap-2">
                                <a href="/product?id=<?= $item["id"] ?>" class="btn btn-primary">Product Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require basePath('view/partials/footer.php'); ?>