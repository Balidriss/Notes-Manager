<?php

namespace Http\Forms;

use Core\Validator;

class NotesForm extends Form
{

    public function __construct(public array $attributes)
    {

        if (!Validator::string($attributes['body'], 1, 255)) {
            $this->errors['body'] = 'A body of no more than 1,000 characters is required.';
        }
    }
}
