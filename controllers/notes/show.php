<?php
$config = require('config.php');


$db = new Database($config['database']);

$heading = 'Note';
$currentUserId = 2;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();
echo $currentUserId;
echo $note['user_id'];
authorize((int)$note['user_id'] === $currentUserId);

require "views/notes/show.view.php";
