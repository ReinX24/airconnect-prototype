<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Get all the selected items in the cart
$selectedItems = [];
$selectedIds = $_GET["selected"];

foreach ($selectedIds as $id) {
    $cartItem = $db->query("SELECT * FROM cart WHERE id = :id", ["id" => $id])->find();
    array_push($selectedItems, $cartItem);
}

echo "<pre>";
var_dump($selectedItems);
echo "</pre>";

// Get the selected items' price