<?php

namespace App\Controllers;

use App\Models\Admins;
use App\Config\Services;
use App\Libraries\Auth;

class AdminsController extends BaseController
{
    /**
     *  Method GET | Route /admin/login
     */
    public function getLogin() 
    {   
        session();
        $data = [
            "validation" => \Config\Services::validation(),
        ];
        return view('admins/login', $data);
    }

    /**
     *  Method POST | Route /admin/login
     */
    public function postLogin()
    {
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

            session()->setFlashdata('errors', $validation->getErrors());
            session()->setFlashdata('input', $data);

            // Redirect back to the form page
            return redirect()->to(base_url('/admin/login'));
        }

        $admins = new Admins();

        $registeredAdmin = $admins->where(['username' => $data['username']])->first();

        if(isset($registeredAdmin)) {
            if(password_verify($data['password'], $registeredAdmin['password'])) {
                $sessionData = [
                    "pk_admin_id" => $registeredAdmin['pk_admin_id'],
                    "username" => $registeredAdmin['username']
                ];
                Auth::setAuth($sessionData);
                return redirect()->to(base_url('/admin/create'));
            }
        }

        session()->setFlashdata('errors', [ "message" => "Wrong Username or Password"]);
        return redirect()->to(base_url('/admin/login'));
    }

    public function create(): string
    {
        return view('admins/datamanagement');
    }
}
