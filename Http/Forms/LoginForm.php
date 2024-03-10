<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {

        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provice a valid email address';
        }

        if (!Validator::string($attributes['password'], 1, 255)) {
            $this->errors['password'] = 'Please provice a valid password';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);
        if ($instance->failed()) {
            ValidationException::throw($instance->errors(), $instance->attributes);
        }
        return $instance;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
    public function failed()
    {
        return count($this->errors);
    }
}
