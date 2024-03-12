<?php

use Core\Session\Session;
use Core\App;
use Core\Database;

$user_id = Session::getId();
$note_id = $_GET['id'];

$note = App::resolve(Database::class)->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $note_id
])->findOrFail();

authorize((int)$note['user_id'] === $user_id);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
