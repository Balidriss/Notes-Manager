<?php


use Http\Forms\NotesForm;
use Core\Session\Session;
use Core\Note;


$body = $_POST['body'];
$user_id = Session::getId();
$note_id = $_POST['id'];

$note = (new Note())->show($note_id, $user_id);
NotesForm::validate($attributes = ['body' => $body]);
authorize((int)$note['user_id'] === $user_id);
(new Note())->update($body, $note_id, $user_id);


redirect('/notes');
