<?php


use Http\Forms\NotesForm;
use Core\Session\Session;
use Core\App;
use Core\Database;

$body = $_POST['body'];
$user_id = Session::getId();
$note_id = $_POST['id'];

$note = App::resolve(Database::class)->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $note_id
])->findOrFail();

NotesForm::validate($attributes = ['body' => $body]);

authorize((int)$note['user_id'] === $user_id);
App::resolve(Database::class)->query('UPDATE notes SET body = :body WHERE id = :id', ['body' => $body, 'id' => $note_id]);

redirect('/notes');
