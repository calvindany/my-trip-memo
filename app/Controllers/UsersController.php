<?php

namespace App\Controllers;

class UsersController extends BaseController
{
    public function index(): string
    {
        // var_dump('aa');
        return view('users/home');
    }
}
