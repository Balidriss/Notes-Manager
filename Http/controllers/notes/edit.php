<?php

$db = Core\App::resolve(Core\Database::class);
$currentUserId = $_SESSION['user']['id'];

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize((int)$note['user_id'] === $currentUserId);


view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);
