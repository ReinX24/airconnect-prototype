<?php

namespace Core;

class Authenticator
{
    public function attemptAddToCart(
        $productId,
        $productName,
        $productPrice,
        $quantity,
        $customerId,
        $customerName
    ) {
        $db = App::resolve(Database::class);
        // Check if the product is already added to the user's cart
        $existingCartItem = $db->query(
            "SELECT * FROM cart WHERE 
            product_id = :product_id AND
            customer_id = :customer_id",
            [
                "product_id" => $productId,
                "customer_id" => $customerId
            ]
        )->find();

        // If the product has already been added to cart, increment entity
        if ($existingCartItem) {
            $db->query(
                "UPDATE cart SET quantity = :quantity WHERE id = :id",
                [
                    "quantity" => $existingCartItem["quantity"] += $quantity,
                    "id" => $existingCartItem["id"]
                ]
            );
        } else {
            $db->query(
                "INSERT INTO 
                cart (product_id, product_name, product_price, quantity, customer_id, customer_name)
            VALUES
                (:product_id, :product_name, :product_price, :quantity, :customer_id, :customer_name)
            ",
                [
                    "product_id" => $productId,
                    "product_name" => $productName,
                    "product_price" => $productPrice,
                    "quantity" => $quantity,
                    "customer_id" => $customerId,
                    "customer_name" => $customerName
                ]
            );
        }
    }

    public function attemptLogin($email, $password)
    {
        // Match the credentials
        $db = App::resolve(Database::class);
        $user = $db->query("SELECT * FROM users WHERE email = :email", [
            "email" => $email
        ])->findOrFail();

        // If a user is not found (false)
        if ($user) {
            // We have a user, but we don't know if the password provided matches what we have in the database.
            if (password_verify($password, $user["password"])) {
                // Log in the user if the credentials match.
                $this->login([
                    'id' => $user["id"],
                    'name' => $user["name"],
                    'email' => $user["email"],
                ]);

                // If the password is verified, then the user is authenticated.
                return true;
            }
        }

        return false;
    }

    public function attemptRegister($name, $email, $password)
    {
        $db = App::resolve(Database::class);
        // Check if the account already exists
        $user = $db->query(
            "SELECT * FROM users WHERE email = :email",
            ["email" => $email]
        )->find();

        // If yes, redirect to login page.
        if ($user) {
            // Then someone with that email already exists and has an account.
            // Return false which will return to the register page with error.
            return false;
        } else {
            // If not, save one to the database, and then log the user in, and redirect.
            $db->query(
                "INSERT INTO users 
                    (name, email, password) 
                VALUES (:name, :email, :password)",
                [
                    'name' => $name,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT)
                ]
            );

            $user = $db->query("SELECT * FROM users WHERE email = :email", [
                "email" => $email
            ])->findOrFail();

            // Mark that the user has logged in.
            $this->login([
                'id' => $user["id"],
                'name' => $name,
                'email' => $email
            ]);

            return true;
        }
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email']
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}
