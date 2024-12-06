<?php

use Core\Authenticator;
use Http\Forms\AddToCartForm;

$form = AddToCartForm::validate(
    $attributes = [
        "product_id" => $_POST["id"],
        "quantity" => $_POST["quantity"],
        "customer_id" => $_SESSION["user"]["id"]
    ]
);

// $addedToCart = (new Authenticator)->attemptAddToCart();

echo "ADDED TO CART SUCCESSFULLY";
