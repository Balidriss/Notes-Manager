<?php

use Http\Forms\NotesForm;
use Core\Session\Session;
use Core\Note;


$body = $_POST['body'];
$user_id = Session::getid();

NotesForm::validate($attributes = ['body' => $body]);

(new Note())->store($body, $user_id);

redirect('/notes');
