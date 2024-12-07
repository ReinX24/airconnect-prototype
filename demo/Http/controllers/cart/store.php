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

(new Authenticator)->attemptAddToCart(
    $attributes["productId"],
    $attributes["productName"],
        $attributes["productPrice"],
    $attributes["quantity"],
    $attributes["customerId"],
    $attributes["customerName"]
);

redirect("/cart");