<?php

namespace Http\Forms;

use Core\Validator;
use Core\ValidationException;

class MaintenanceTicketForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::string($attributes["name"],)) {
            $this->errors['name'] = 'Name cannot be empty.';
        }

        if (!Validator::email($attributes["email"])) {
            $this->errors["email"] = 'Invalid Email.';
        }

        if (!Validator::string($attributes["message"], 7)) {
            $this->errors['message'] = 'Message should be more than 7 characters.';
        }

        if (!Validator::string($attributes["contactInfo"])) {
            $this->errors['contact_info'] = 'Contact Information cannot be empty.';
        }

        if (!Validator::string($attributes["location"])) {
            $this->errors['location'] = 'Location cannot be empty.';
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
