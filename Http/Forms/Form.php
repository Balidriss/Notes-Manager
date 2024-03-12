<?php

namespace Http\Forms;

use Core\ValidationException;


class Form
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        //validations ?
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

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
        return $this;
    }
    public function failed()
    {
        return count($this->errors);
    }
}
