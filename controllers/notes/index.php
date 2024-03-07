<?php

$config = require base_path('config.php');
$db = new Core\Database($config['database']);

$notes = $db->query('select * from notes')->get();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);
