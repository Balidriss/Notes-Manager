<?php

$db = Core\App::resolve(Core\Database::class);

$notes = $db->query('select * from notes')->get();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);
