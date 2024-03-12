<?php

use Core\Session\Session;
use Core\Note;


$user_id = Session::getId();
$note_id = $_GET['id'];


$note = (new Note())->show($note_id, $user_id);


view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
