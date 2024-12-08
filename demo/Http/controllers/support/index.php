<?php

use Core\Session;

view("support/index.view.php", [
    'heading' => "Customer Support",
    "errors" => Session::get("errors") ?? "",
]);