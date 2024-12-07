<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <?php if (isset($errors["quantity"])) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="fs-4"><?= $errors["quantity"] ?></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
    <div class="mb-3 d-flex justify-content-between">
        <div>
            <!-- TODO: format price -->
            <p class="lead"><strong>Price:</strong> <?= $product["price"] ?></p>
            <p class="lead"><strong>Stock:</strong> <?= $product["stock"] ?></p>
        </div>
        <div class="d-flex align-items-center">
            <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#addToCartModal">
                Add To Cart
            </button>
        </div>
    </div>
    <div class="d-flex flex-column align-items-center">
        <img src="<?= $product["photo"] ?>" alt="<?= $product["name"] ?>-photo" class="border rounded-4 img-fluid">
    </div>
    <div class="mt-3">
        <p class="lead">&emsp;<?= $product["description"] ?></p>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5">Add To Cart</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <form action="/cart/add" method="POST" id="addToCartForm">
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
                    <button type="submit" form="addToCartForm" class="btn btn-lg btn-primary">Add To Cart</button>
                    <button type="button" class="btn btn-lg btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require basePath('views/partials/footer.php'); ?>