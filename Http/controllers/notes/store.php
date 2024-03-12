<?php

use Http\Forms\NotesForm;
use Core\Session\Session;
use Core\App;
use Core\Database;

$body = $_POST['body'];
$user_id = Session::getid();

NotesForm::validate($attributes = ['body' => $body]);

App::resolve(Database::class)->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    'body' => $body,
    'user_id' => $user_id
]);


redirect('/notes');
