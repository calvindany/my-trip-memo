<?php

namespace App\Controllers;

use App\Models\Admins;
use App\Models\BlogPosts;
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

    /**
     *  Method GET | Route /admin/create
     */
    public function getCreate(): string
    {
        return view('admins/datamanagement', ['formtype' => 'add']);
    }

    /**
     *  Method POST | Route /admin/create
     */
    public function postCreate()
    {
        $validation = \Config\Services::validation();
        $blogPostModel = new BlogPosts();

        $validation->setRules([
            'title' => 'required',
            'date' => 'required',
            'address' => 'required',
            'thumbnail' => 'mime_in[thumbnail,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
            'description' => 'required',
        ]);

        $data = [
            'title' => $this->request->getPost('title'),
            'date' => $this->request->getPost('date'),
            'address' => $this->request->getPost('address'),
            'description' => $this->request->getPost('description'),
        ];

        if(!($validation->run($data))) {
            session()->setFlashdata('errors', $validation->getErrors());
            session()->setFlashdata('input', $data);
            return redirect()->to(base_url('/admin/create'));
        }

        $config['upload_path']   = 'public/uploads/';
        $config['allowed_types'] = 'png|jpg|gif';
        $config['max_size']      = 1000;
        $config['file_ext_tolower'] = TRUE;

        try {
            $img = $this->request->getFile('thumbnail');
    
            if (! $img->hasMoved()) {
                $filename = $img->getRandomName();
                $img->move('uploads/', $filename);
    
                $data['thumbnail'] = 'uploads/' . $filename;
            }
        } catch (\Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
        }

        $data['created_at'] = date('Y-m-d H:i:s');
        $data['fk_admin_id'] = 1;

        try {
            $blogPostModel->insert($data);

            // Change this route to admin dashboard after done develop
            return redirect()->to(base_url('/admin/create'));
        } catch (\Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());

            session()->setFlashdata('errors', [ "message" => "Internal Server Error"]);
            session()->setFlashdata('input', $data);

            return redirect()->to(base_url('/admin/create'));
        }
        
    }

    /**
     *  Method GET | Route /admin/update/:id
     */
    public function getUpdate($id = '') {
        $blogPostModel = new BlogPosts();

        $data = $blogPostModel->where('pk_blog_id', $id)->first();
        if ($data === null) {
            // Data not found, you can handle this case differently or load a default view
            return view('errors/html/error_404');
        } else {
            $date = explode(" ", $data['created_at']);

            $data['created_at'] = $date[0];
            return view('admins/datamanagement', ['data' => $data, 'formtype' => 'edit']);
        }
    }


    /**
     *  Method POST | Route /admin/logout
     */
    public function postLogout() {
        Auth::deleteAuth();

        return redirect()->to('/');
    }
}
