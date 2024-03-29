<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm extends Form
{

    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'], 1, 255)) {
            $this->errors['email'] = 'Please provice a valid email address.';
        }

        if (!Validator::string($attributes['password'], 1, 255)) {
            $this->errors['password'] = 'Please provice a valid password.';
        }
    }
}
