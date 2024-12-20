<?php

namespace Http\Forms;

use Core\Validator;
use Core\ValidationException;

class RegisterForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::string($attributes["name"])) {
            $this->errors["name"] = "Please provide a valid name.";
        }

        if (!Validator::email($attributes["email"])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (!Validator::string($attributes["password"], 7, 255)) {
            $this->errors['password'] = 'Please provide a password of at least seven characters.';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors());
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}
