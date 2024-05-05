<?php

namespace App\Controllers;

use App\Models\Admins;
use App\Config\Services;
use App\Libraries\Auth;

class AdminsController extends BaseController
{
    public function login()
    {
        if($this->request->getMethod() == 'POST') {
            $validation = \Config\Services::validation();

            $validation->setRules([
                'username' => 'required',
                'password' => 'required'
            ]);

            $data = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
            ];

            if (!($validation->run($data))) {
                var_dump('data tidak lengkap');
                return redirect()->to(base_url('/admin/login'));
            }

            $admins = new Admins();

            $registeredAdmin = $admins->where(['username' => $data['username']])->first();

            if(password_verify($data['password'], $registeredAdmin['password'])) {
                $sessionData = [
                    "pk_admin_id" => $registeredAdmin['pk_admin_id'],
                    "username" => $registeredAdmin['username']
                ];
                Auth::setAuth($sessionData);
                return redirect()->to(base_url('/admin/create'));
            }

            return view('admins/login');
        }
        
        return view('admins/login');
    }

    public function create(): string
    {
        return view('admins/datamanagement');
    }
}
