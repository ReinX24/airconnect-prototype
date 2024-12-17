<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

foreach ($_POST["cartItemIds"] as $id) {
    $checkoutItem = $db->query("SELECT * FROM cart WHERE id = :id", [
        "id" => $id
    ])->find();

    // Add product to our purchases table
    $db->query(
        "INSERT INTO 
            purchases (product_id, product_name, product_price, quantity, customer_id, customer_name)
        VALUES
            (:product_id, :product_name, :product_price, :quantity, :customer_id, :customer_name)
        ",
        [
            "product_id" => $checkoutItem["product_id"],
            "product_name" => $checkoutItem["product_name"],
            "product_price" => $checkoutItem["product_price"],
            "quantity" => $checkoutItem["quantity"],
            "customer_id" => $checkoutItem["customer_id"],
            "customer_name" => $checkoutItem["customer_name"]
        ]
    );

    // Remove cart item
    $db->query("DELETE FROM cart WHERE id = :id", [
        "id" => $checkoutItem["id"]
    ]);

    // Decrease product quantity
    $product = $db->query("SELECT id, stock FROM products WHERE id = :product_id", [
        "product_id" => $checkoutItem["product_id"]
    ])->find();

    $updatedStock = $product["stock"] - $checkoutItem["quantity"];

    $db->query("UPDATE products SET stock = :stock WHERE id = :id", [
        "stock" => $updatedStock,
        "id" => $product["id"]
    ]);
}

redirect("/cart");

// $db->query(
//     "INSERT INTO 
//         purchases (product_id, product_name, product_price, quantity, customer_id, customer_name)
//     VALUES 
//         (:product_id, :product_name, :product_price, :quantity, :customer_id, :customer_name)"
// );
