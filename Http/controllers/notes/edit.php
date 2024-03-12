<?php

use Core\Session\Session;
use Core\Note;

$note_id =  $_GET['id'];
$user_id = Session::getId();


$note = (new Note())->edit($note_id, $user_id);

view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => Session::get('errors'),
    'note' => $note
]);
