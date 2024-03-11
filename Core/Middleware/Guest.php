<?php

namespace Core\Middleware;

use Core\Session;

class Guest
{


    public function handle()
    {
        if (Session::isLogged()) {
            header('location: /');
            exit();
        }
    }
}
