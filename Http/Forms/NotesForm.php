<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class NotesForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {

        if (!Validator::string($attributes['body'], 1, 1000)) {
            $this->errors['body'] = 'A body of no more than 1,000 characters is required.';
        }
        if (!Validator::id($attributes['user_id'], $attributes['note_id'])) {
            $this->errors['id'] = 'Not allowed';
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
