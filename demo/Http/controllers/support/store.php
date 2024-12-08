<?php

use Core\Authenticator;
use Http\Forms\CustomerSupportForm;

$form = CustomerSupportForm::validate(
    $attributes = [
        "name" => $_SESSION["user"]["name"],
        "email" => $_SESSION["user"]["email"],
        "message" => $_POST["message"],
        "contact_info" => $_POST["contact_info"],
        "location" => $_POST["location"]
    ] 
);
