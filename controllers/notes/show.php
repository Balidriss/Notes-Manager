<?php

$db = Core\App::resolve(Core\Database::class);

$currentUserId = $_SESSION['user']['id'];

//todo need to handle this somewhere else

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();


authorize((int)$note['user_id'] === $currentUserId);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
