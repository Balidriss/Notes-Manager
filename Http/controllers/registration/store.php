<?php

use Core\Validator;

$db = Core\App::resolve(Core\Database::class);
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


$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();


if ($user) {
    login($user);
    redirect('/');
} else {

    $db->query('INSERT INTO users(name, email, password) VALUES ("tempname", :email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);
    $user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();
    login($user);
    redirect('/');
}
