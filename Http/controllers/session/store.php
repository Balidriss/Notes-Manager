<?php

use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = LoginForm::validate($attributes = ['email' => $email, 'password' => $password]);

if ((new Core\Authenticator())->attempt($attributes['email'], $attributes['password'])) {
    redirect('/');
}

$form->error('email', 'No matching account.');




redirect('/login');
