<?php

namespace App\Libraries;

class Auth 
{
    public static function setAuth($data) {
        $session = session();
        $isLogging = ['isLoggedIn' => true];

        $session->set($isLogging);
        $session->set(["data" => $data]);
    }

    public static function isAuthenticated() {
        $session = session();
        return $session->has('isLoggedIn');
    }

    public static function deleteAuth() {
        $session = session();
        $session->remove('isLoggedIn');
        $session->remove('data');
    }
}
