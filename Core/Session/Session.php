<?php

namespace Core\Session;

class Session
{
    public static function has($key)
    {
        return (bool) static::get($key);
    }
    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }
    public static function flash($key, $value)
    {
        return $_SESSION['_flash'][$key] = $value;
    }
    public static function unflash()
    {
        unset($_SESSION['_flash']);
    }
    public static function flush()
    {
        $_SESSION = [];
    }

    public static function isLogged()
    {
        return (bool)static::get('user');
    }

    public static function getId()
    {
        return static::isLogged() ? static::get('user')['id'] : null;
    }

    public static function login($user)
    {
        $_SESSION['user'] = $user;
        session_regenerate_id(true);
    }
    public static function logout()
    {
        Session::destroy();
    }
    public static function destroy()
    {
        Session::flush();
        session_destroy();
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 9999, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
