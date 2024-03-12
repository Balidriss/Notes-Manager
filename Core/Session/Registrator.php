<?php

namespace Core\Session;

use Core\App;
use Core\Database;

class Registrator
{
    public function attempt($name, $email, $password)
    {

        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();


        if (!$user) {

            App::resolve(Database::class)->query('INSERT INTO users(name, email, password) VALUES (:name, :email, :password)', [
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
            Session::login($user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find());
        }
        return !empty($user);
    }
}
