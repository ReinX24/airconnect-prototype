<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;
use Http\Forms\RegisterForm;

$form = RegisterForm::validate(
    $attributes = [
        "name" => $_POST["name"],
        "email" => $_POST['email'],
        "password" => $_POST['password'],
    ]
);

$registeredAccount = (new Authenticator)->attemptRegister(
    $attributes["name"],
    $attributes["email"],
    $attributes["password"]
);

if (!$registeredAccount) {
    // When an account is found, redirect back to the login page.
    redirect("/login");
}

// If the user successfully registers their account, 
redirect("/");
