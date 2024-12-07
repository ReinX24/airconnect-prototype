<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Get all the selected items in the cart
$selectedItems = []; // all selected items
$totalCost = 0; // total price of all items
$selectedIds = $_GET["selected"];

// If there are not selected id's, redirect to cart page
if (!$selectedIds) {
    redirect("/cart");
}

foreach ($selectedIds as $id) {
    $cartItem = $db->query("SELECT * FROM cart WHERE id = :id", ["id" => $id])->find();

    $product = $db->query(
        "SELECT * FROM products WHERE id = :id",
        [
            "id" => $cartItem["product_id"]
        ]
    )->find();

    $cartItem["photo"] = $product["photo"];

    $totalCost += $cartItem["product_price"] * $cartItem["quantity"];

    array_push($selectedItems, $cartItem);
}

dd($selectedItems);

// TODO: view photos
view("cart/checkout.view.php", [
    "heading" => "Checkout",
    "selectedItems" => $selectedItems,
    "totalCost" => $totalCost
]);
