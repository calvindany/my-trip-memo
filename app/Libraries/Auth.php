<?php

namespace App\Libraries;

class Auth 
{
    public static function setAuth($data) {
        $session = session();
        $isLoggin = ['isLoggedIn'=>true];

        $session.set($isLoggin);
        $session.set(["data"=>$data]);
    }

    public static function isAuthenticated() {
        $session = session();
        return $session.get('isLoggedIn');
    }

    public static function deleteAuth() {
        $session = session();
        $session->remove('isLoggedIn');
        $session->remove('data');
    }
}