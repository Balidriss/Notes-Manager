<?php


$db = Core\App::resolve(Core\Database::class);
$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];


$form = new Http\Forms\LoginForm();
if (!$form->validate($email, $password)) {
    return view('registration/create.view.php', ['errors' => $form->errors()]);
}


$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();


if ($user && password_verify($password, $user['password'])) {

    login($user);
} else {
    $errors['email'] = 'No matching account';
}


header('location: /');
exit();
