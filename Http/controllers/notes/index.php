<?php

use Core\Session\Session;



$notes = Core\App::resolve(Core\Database::class)->query('SELECT * FROM notes WHERE user_id = :id', ['id' => Session::getId()])->get();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);
