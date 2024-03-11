<?php

use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = LoginForm::validate($attributes = ['email' => $email, 'password' => $password]);

$signedIn = (new Core\Registrator())->attempt($attributes['email'], $attributes['password']);


if ($signedIn) {
    $form->error('email', 'Mail already exist.')->throw();
}
redirect('/');

// use Core\Validator;

// $email = $_POST['email'];
// $password = $_POST['password'];

// if (!Validator::email($email)) {
//     $errors['email'] = 'Please provice a valid email address';
// }

// if (!Validator::string($password, 6, 255)) {
//     $errors['password'] = 'Please provice a valid password between 7 and 255 characters';
// }

// if (!empty($errors)) {
//     return view('registration/create.view.php', ['errors' => $errors]);
// }


// $user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();


// if ($user) {
//     login($user);
//     redirect('/');
// } else {

//     $db->query('INSERT INTO users(name, email, password) VALUES ("UnknownName", :email, :password)', [
//         'email' => $email,
//         'password' => password_hash($password, PASSWORD_DEFAULT)
//     ]);
//     $user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();
//     login($user);
//     redirect('/');
// }
