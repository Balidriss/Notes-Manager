<?php


use Core\Session\Session;
use Core\App;
use Core\Database;


$note_id = $_POST['id'];
$user_id = Session::getId();

$note = App::resolve(Database::class)->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $note_id
])->findOrFail();

authorize((int)$note['user_id'] === $user_id);

App::resolve(Database::class)->query(
    'DELETE FROM notes WHERE id = :id',
    ['id' => $note_id]
);

redirect('/notes');
