<?php


use Core\Session\Session;
use Core\Note;

$note_id = $_POST['id'];
$user_id = Session::getId();

(new Note())->delete($note_id, $user_id);

redirect('/notes');
