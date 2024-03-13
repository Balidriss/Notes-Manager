<?php

namespace Http\Forms;

use Core\Validator;

class RegisterForm extends Form
{

    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provice a valid email address.';
        }

        if (!Validator::string($attributes['password'], 1, 255)) {
            $this->errors['password'] = 'Please provice a valid password.';
        }

        if (!Validator::string($attributes['name'], 1, 20)) {
            $this->errors['name'] = 'Please provice a name, with less than 20 characters.';
        }
    }
}
