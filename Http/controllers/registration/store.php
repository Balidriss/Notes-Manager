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
