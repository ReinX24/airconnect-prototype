<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$products = $db->query("SELECT * FROM products")->all();

view('products/index.view.php', [
    'heading' => 'Products',
    'products' => $products
]);

// echo "PRODCUTS INDEX PAGE";