<?php


view(
    "notes/create.view.php",
    [
        'heading' => 'Create Note',
        'errors' => Core\Session::get('errors')
    ]
);
