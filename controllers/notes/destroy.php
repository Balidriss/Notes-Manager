<?php
$config = require base_path('config.php');
$db = new Core\Database($config['database']);

$currentUserId = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize((int)$note['user_id'] === $currentUserId);

$db->query(
    'DELETE FROM notes WHERE id = :id',
    ['id' => $_POST['id']]
);

header('location: /notes');
exit();
