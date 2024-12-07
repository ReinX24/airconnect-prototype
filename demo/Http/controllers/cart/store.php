<?php

use Core\Authenticator;
use Http\Forms\AddToCartForm;

$form = AddToCartForm::validate(
    $attributes = [
        "productId" => $_POST["productId"],
        "productName" => $_POST["productName"],
        "productPrice" => $_POST["productPrice"],
        "quantity" => $_POST["quantity"],
        "customerId" => $_SESSION["user"]["id"],
        "customerName" => $_SESSION["user"]["name"]
    ]
);

// TODO: check if item is already in user's cart, if so, just add to quantity
(new Authenticator)->attemptAddToCart(
    $attributes["productId"],
    $attributes["productName"],
        $attributes["productPrice"],
    $attributes["quantity"],
    $attributes["customerId"],
    $attributes["customerName"]
);

redirect("/cart");