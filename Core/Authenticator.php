<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {

        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();


        if ($user && password_verify($password, $user['password'])) {

            $this->login($user);
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
