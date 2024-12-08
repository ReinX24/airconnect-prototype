<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Get past purchases that the customer has made
$pastPurchases = $db->query(
    "SELECT * FROM purchases WHERE customer_id = :customer_id ORDER BY created_at DESC",
    [
        "customer_id" => $_SESSION["user"]["id"]
    ]
)->all();

view("maintenance/index.view.php", [
    "heading" => "Maintenance",
    "purchases" => $pastPurchases
]);
