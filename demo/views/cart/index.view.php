<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <div class="mb-2 d-flex justify-content-center gap-2">
        <button type="submit" form="checkoutForm" class="btn btn-success" value="Submit">Checkout</button>
        <button type="button" id="selectAllBtn" class="btn btn-secondary">Select All</button>
        <button type="button" id="deselectAllBtn" class="btn btn-outline-secondary">Deselect All</button>
    </div>
    <div class="mb-4 d-flex justify-content-center gap-2">
        <!-- TODO: implement these functionalities -->
        <a href="/cart/clear" class="btn btn-danger">Clear Cart</a>
        <a href="/cart/clear" class="btn btn-outline-danger">Remove Selected Items</a>
    </div>
    <form action="/checkout" method="GET" id="checkoutForm">
        <?php foreach ($cart as $item) : ?>
            <div class="card mb-3">
                <div class="d-flex">
                    <div class="d-flex align-items-center mx-4">
                        <input class="form-check-input mt-0" name="selected[]" type="checkbox" value="<?= $item["cart_id"] ?>" style="width: 4rem; height: 4rem;">
                    </div>
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
                                    <!-- <form action="/cart/delete-item" method="POST" id="deleteItem">
                                        <input type="hidden" name="cart_id" value="<?= $item["cart_id"] ?>">
                                        <button type="submit" class="btn btn-danger" form="deleteItem">Remove</button>
                                    </form> -->
                                </div>
                                <!-- <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </form>
</div>

<script>
    document.querySelector("#selectAllBtn").addEventListener("click", function() {
        const allCheckBoxes = document.querySelectorAll('input[type="checkbox"]');
        for (let i = 0; i < allCheckBoxes.length; i++) {
            allCheckBoxes[i].checked = true;
        }
    });

    document.querySelector("#deselectAllBtn").addEventListener("click", function() {
        const allCheckBoxes = document.querySelectorAll('input[type="checkbox"]');
        for (let i = 0; i < allCheckBoxes.length; i++) {
            allCheckBoxes[i].checked = false;
        }
    });
</script>

<?php basePath('view/partials/footer.php'); ?>