<?php


$db = Core\App::resolve(Core\Database::class);


$currentUserId = $_SESSION['user']['id'];

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize((int)$note['user_id'] === $currentUserId);

$db->query(
    'DELETE FROM notes WHERE id = :id',
    ['id' => $_POST['id']]
);

header('location: /notes');
exit();
