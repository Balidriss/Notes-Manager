<?php

$notes = Core\App::resolve(Core\Database::class)->query('select * from notes')->get();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);
