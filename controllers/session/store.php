<?php

use Core\Validator;

$db = Core\App::resolve(Core\Database::class);
$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provice a valid email address';
}

if (!Validator::string($password, 6, 255)) {
    $errors['password'] = 'Please provice a valid password';
}


$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();


if ($user && password_verify($password, $user['password'])) {

    login($user);
} else {
    $errors['email'] = 'No matching account';
}


if (!empty($errors)) {
    return view('/session/create.view.php', ['errors' => $errors]);
}
header('location: /');
exit();
