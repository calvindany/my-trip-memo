<?php

namespace App\Controllers;

class AdminsController extends BaseController
{
    public function create(): string
    {
        return view('admins/datamanagement');
    }
}
