<?php

namespace Core\Middleware;

use Core\Session\Session;

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
