<?php

namespace Core;

class Registrator
{
    public function attempt($email, $password)
    {

        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();


        if (!$user) {

            App::resolve(Database::class)->query('INSERT INTO users(name, email, password) VALUES ("UnknownName", :email, :password)', [
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
            $this->login($user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find());
        }
        return !empty($user);
    }

    public function login($user)
    {
        $_SESSION['user'] = $user;
        session_regenerate_id(true);
    }


    public static function logout()
    {
        Session::destroy();
    }
}
