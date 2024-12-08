<?php

use Core\Session;

view("maintenance/ticket.view.php", [
    "heading" => "Maintenance Support",
    "errors" => Session::get("errors") ?? "",
]);