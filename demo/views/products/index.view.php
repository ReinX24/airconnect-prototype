<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <div class="album py-5 px-3 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($products as $product) : ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="<?= $product["photo"] ?>" alt="<?= $product["name"] ?>-photo" class="border-bottom m-2">
                            <div class="card-body">
                                <h4><?= $product["name"] ?></h4>
                                <!-- TODO: format price -->
                                <p class="card-text lead">
                                    <strong>Price:</strong> <?= $product["price"] ?>
                                    <br>
                                    <strong>Stock:</strong> <?= $product["stock"] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="/product?id=<?= $product["id"] ?>" class="btn btn btn-outline-primary">Info</a>
                                        <!-- TODO: add to cart functionality from this page -->
                                        <button type="button" class="btn btn btn-outline-success">Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php require basePath('views/partials/footer.php'); ?>