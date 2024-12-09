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
                                        <?php if (isset($_SESSION["user"])) : ?>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addToCartModal<?= $product["id"] ?>">
                                                Add To Cart
                                            </button>
                                        <?php else: ?>
                                            <a href="/login" class="btn btn-success">Add To Cart</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="addToCartModal<?= $product["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content rounded-4 shadow">
                                <div class="modal-header border-bottom-0">
                                    <h1 class="modal-title fs-5">Add To Cart</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body py-0">
                                    <form action="/cart/add" method="POST" id="addToCartForm<?= $product["id"] ?>">
                                        <!-- <p><?= $product["id"] ?></p> -->
                                        <input type="hidden" name="productId" value="<?= $product["id"] ?>">
                                        <input type="hidden" name="productPrice" value="<?= $product["price"] ?>">
                                        <input type="hidden" name="productName" value="<?= $product["name"] ?>">
                                        <div>
                                            <label for="quantity" class="form-label fs-5">Quantity</label>
                                            <input type="number" name="quantity" class="form-control form-control-lg" min="1" value="1" max="<?= $product["stock"] ?>" onkeydown="return false">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
                                    <button type="submit" form="addToCartForm<?= $product["id"] ?>" class="btn btn-lg btn-primary">Add To Cart</button>
                                    <button type="button" class="btn btn-lg btn-secondary" data-bs-dismiss="modal">Cancel</button>
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