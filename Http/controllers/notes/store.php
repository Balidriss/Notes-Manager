<?php

use Core\Session;
use Http\Forms\NotesForm;

$body = $_POST['body'];
$user_id = Session::getid();

NotesForm::validate($attributes = ['body' => $body]);

Core\App::resolve(Core\Database::class)->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    'body' => $body,
    'user_id' => $user_id
]);


redirect('/notes');
