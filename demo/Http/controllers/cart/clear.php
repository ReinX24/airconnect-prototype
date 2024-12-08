<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$db->query(
    "DELETE FROM cart WHERE customer_id = :customer_id",
    [
        'customer_id' => $_SESSION["user"]["id"]
    ]
);

redirect("/cart");
