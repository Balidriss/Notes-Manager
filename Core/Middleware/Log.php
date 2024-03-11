<?php

namespace Core\Middleware;

use Core\Session;

class Log
{
    public function handle()
    {
        if (!Session::isLogged()) {
            header('location: /');
            exit();
        }
    }
}
