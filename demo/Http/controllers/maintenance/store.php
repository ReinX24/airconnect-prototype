<?php

use Core\Authenticator;
use Http\Forms\MaintenanceTicketForm;

$form = MaintenanceTicketForm::validate(
    $attributes = [
        "productId" => $_POST["product_id"],
        "productName" => $_POST["product_name"],
        "purchaseDate" => $_POST["purchase_date"],
        "name" => $_POST["name"],
        "email" => $_POST["email"],
        "category" => $_POST["category_select"],
        "message" => $_POST["message"],
        "contactInfo" => $_POST["contact_info"],
        "location" => $_POST["location"]
    ]
);

(new Authenticator)->attemptSubmitMaintenanceTicket(
    $_SESSION["user"]["id"],
            $_SESSION["user"]["name"],
            $_SESSION["user"]["email"],
        $attributes["productId"],
        $attributes["productName"],
        $attributes["purchaseDate"],
        $attributes["category"],
        $attributes["message"],
);

redirect("/maintenance");