<?php

use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provice a valid email address';
}

if (!Validator::string($password, 6, 255)) {
    $errors['password'] = 'Please provice a valid password between 7 and 255 characters';
}

if (!empty($errors)) {
    return view('registration/create.view.php', ['errors' => $errors]);
}

$db = Core\App::resolve(Core\Database::class);
$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();
$_SESSION['user'] = ['email' => $email];
if ($user) {
    $_SESSION['user'] = ['email' => $email];

    header('location: /');
    exit();
} else {
    $db->query('INSERT INTO users(email, password) VALUES (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);


    header('location: /');
    exit();
}
