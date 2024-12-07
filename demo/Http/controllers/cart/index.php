<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserCart = $db->query(
    "SELECT * FROM cart WHERE customer_id = :user_id ORDER BY created_at DESC",
    [
        "user_id" => $_SESSION["user"]["id"]
    ]
)->all();

$cartItems = [];

foreach ($currentUserCart as $item) {
    $product = $db->query(
        "SELECT id, name, price, stock, photo 
        FROM products WHERE id = :item_id",
        ["item_id" => $item["product_id"]]
    )->find();

    if ($product) {
        $product["cart_id"] = $item["id"];
        $product["quantity"] = $item["quantity"];
        $product["added_to_cart_at"] = $item["created_at"];
        array_push($cartItems, $product);
    }
}

view("cart/index.view.php", [
    "heading" => "Cart",
    "cart" => $cartItems
]);
