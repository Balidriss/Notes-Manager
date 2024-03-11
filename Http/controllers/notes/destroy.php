<?php

use Core\Session;

$note_id = $_POST['id'];
$user_id = Session::getId();

$note = Core\App::resolve(Core\Database::class)->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $note_id
])->findOrFail();

authorize((int)$note['user_id'] === $user_id);

Core\App::resolve(Core\Database::class)->query(
    'DELETE FROM notes WHERE id = :id',
    ['id' => $note_id]
);

redirect('/notes');
