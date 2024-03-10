<?php

$db = Core\App::resolve(Core\Database::class);
$currentUserId = 1;
$errors = [];

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize((int)$note['user_id'] === $currentUserId);


if (!Core\Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if (!empty($errors)) {
    return view("notes/edit.view.php", [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('UPDATE notes SET body = :body WHERE id = :id', ['body' => $_POST['body'], 'id' => $_POST['id']]);

header('location: /notes');
die();
