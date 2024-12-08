<?php

use Core\Authenticator;
use Http\Forms\CustomerSupportForm;

$form = CustomerSupportForm::validate(
    $attributes = [
        "user_id" => $_SESSION["user"]["id"],
        "name" => $_SESSION["user"]["name"],
        "email" => $_SESSION["user"]["email"],
        "message" => $_POST["message"],
        "contact_info" => $_POST["contact_info"],
        "location" => $_POST["location"]
    ] 
);

(new Authenticator)->attemptSubmitSupportTicket(
    $attributes["user_id"],
    $attributes["name"],
    $attributes["email"],
    $attributes["message"],
    $attributes["contact_info"],
    $attributes["location"],
);

redirect("/support");

