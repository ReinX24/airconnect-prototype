<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$cartId = $_POST["cart_id"];

$db->query("DELETE FROM cart WHERE id = :cart_id", ["cart_id" => $_POST["cart_id"]]);

redirect("/cart");

// $db->query("DELETE FROM cart WHERE");