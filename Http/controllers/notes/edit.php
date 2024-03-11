<?php

use Core\Session;

$note_id =  $_GET['id'];
$user_id = Session::getId();


$note = Core\App::resolve(Core\Database::class)->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $note_id
])->findOrFail();

authorize((int)$note['user_id'] === $user_id);

view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => Core\Session::get('errors'),
    'note' => $note
]);
