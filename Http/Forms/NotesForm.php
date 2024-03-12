<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class NotesForm extends Form
{

    public function __construct(public array $attributes)
    {

        if (!Validator::string($attributes['body'], 1, 1000)) {
            $this->errors['body'] = 'A body of no more than 1,000 characters is required.';
        }
        if (!Validator::id($attributes['user_id'], $attributes['author_id'])) {
            $this->errors['id'] = 'Not allowed';
        }
    }
}
