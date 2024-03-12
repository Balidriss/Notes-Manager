<?php

use Core\Session\Session;
use Core\App;
use Core\Database;

$note_id =  $_GET['id'];
$user_id = Session::getId();


$note = App::resolve(Database::class)->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $note_id
])->findOrFail();

authorize((int)$note['user_id'] === $user_id);

view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => Session::get('errors'),
    'note' => $note
]);
