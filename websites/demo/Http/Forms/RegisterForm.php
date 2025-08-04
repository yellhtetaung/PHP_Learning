<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class RegisterForm
{
    protected array $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::string($this->attributes['name'], 3, 255)) {
            $this->errors['name'] = 'Please provide a name of at least 3 characters.';
        }

        if (!Validator::email($this->attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address';
        }

        if (!Validator::string($this->attributes['password'], 7, 255)) {
            $this->errors['password'] = 'Please provide a password of at least 7 characters.';
        }

    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw(): void
    {
        VAlidationException::throw($this->errors(), $this->attributes);
    }

    public function failed(): int
    {
        return count($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}
