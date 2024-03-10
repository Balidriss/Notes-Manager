<?php

use Core\Session;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new Http\Forms\LoginForm();
if ($form->validate($email, $password)) {
    if ((new Core\Authenticator())->attempt($email, $password)) {
        redirect('/');
    }

    $form->error('email', 'No matching account.');
}

Session::flash('errors', $form->errors());
Session::flash('old', ['email' => $email]);

redirect('/login');
