<?php

use Core\Session;

$db = Core\App::resolve(Core\Database::class);

$user_id = Session::getId();
$note_id = $_GET['id'];

$note = Core\App::resolve(Core\Database::class)->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $note_id
])->findOrFail();

authorize((int)$note['user_id'] === $user_id);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
