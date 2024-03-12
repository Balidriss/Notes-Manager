<?php

use Http\Forms\LoginForm;
use Core\Session\Registrator;
use Http\Forms\RegisterForm;

$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];

$form = RegisterForm::validate($attributes = ["name" => $name, 'email' => $email, 'password' => $password]);
$signedIn = (new Registrator())->attempt($attributes['name'], $attributes['email'], $attributes['password']);

if ($signedIn) {
    $form->error('email', 'Mail already exist.')->throw();
}
redirect('/');
