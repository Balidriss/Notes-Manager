<?php

use Core\Session\Session;

view(
    "notes/create.view.php",
    [
        'heading' => 'Create Note',
        'errors' => Session::get('errors')
    ]
);
