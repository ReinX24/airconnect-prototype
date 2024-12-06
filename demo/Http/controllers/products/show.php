<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$id = $_GET["id"];

$product = $db->query(
    "SELECT * FROM products WHERE id = :id",
    ['id' => $id]
)->findOrFail();

view('products/show.view.php', [
    'heading' => $product["name"],
    'product' => $product,
    "errors" => Session::get("errors") ?? "",
]);
