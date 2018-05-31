<?php

namespace Engine\Core\Auth;

use Engine\Core\Cookie;

class Auth implements AuthInterface
{
    /**
     * @var bool
     */
    protected $authorized = false;
    protected $user;

    /**
     * @return bool
     */
    public function autorized()
    {
        return $this->authorized;
    }

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->user;
    }

    /**
     * User authorization
     * @return void
     */
    public function autorize($user)
    {
        Cookie::set('auth.authorized',true);
        Cookie::set('auth.user',$user);
        $this->authorized = true;
        $this->user = $user;
    }

    /**
     * User unauthorization
     * @return void
     */
    public function unAutorize($user)
    {
        Cookie::delete('auth.authorized');
        Cookie::delete('auth.user');
        $this->authorized = false;
        $this->user = null;
    }

    /**
     * Generate a new random password salt
     * @return int
     */
    public static function salt()
    {
        return (string) rand(10000000,99999999);
    }

    /**
     * Generates a hash
     * @param $password
     * @param string $salt
     * @return string
     */
    public static function encryptPassword($password, $salt = '')
    {
        return hash('sha256',$password . $salt);
    }

}