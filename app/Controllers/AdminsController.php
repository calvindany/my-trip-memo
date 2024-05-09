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
            "title" => "Login | My Trip Memo",
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

        if (isset($registeredAdmin)) {
            if (password_verify($data['password'], $registeredAdmin['password'])) {
                $sessionData = [
                    "pk_admin_id" => $registeredAdmin['pk_admin_id'],
                    "username" => $registeredAdmin['username']
                ];
                Auth::setAuth($sessionData);
                return redirect()->to(base_url('/admin/create'));
            }
        }

        session()->setFlashdata('errors', ["message" => "Wrong Username or Password"]);
        return redirect()->to(base_url('/admin/login'));
    }

    /**
     *  Method GET | Route /admin/
     */
    public function manage()
    {
        $blogPostModel = new BlogPosts();
        $data['posts'] = $blogPostModel->findAll();
        $data['title'] = "Home | My Trip Memo";

        return view('admins/manage-travels', $data);
    }

    /**
     *  Method GET | Route /admin/create
     */
    public function getCreate(): string
    {
        $data = [
            "title" => "Create Post | My Trip Memo",
            "formtype" => "add",
        ];

        return view('admins/datamanagement', $data);
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
            'created_at' => 'required',
            'address' => 'required',
            'thumbnail' => 'mime_in[thumbnail,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
            'description' => 'required',
        ]);

        $data = [
            'title' => $this->request->getPost('title'),
            'created_at' => $this->request->getPost('created_at'),
            'address' => $this->request->getPost('address'),
            'description' => $this->request->getPost('description'),
        ];

        if (!($validation->run($data))) {
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

            if (!$img->hasMoved()) {
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

            session()->setFlashdata('success', ["message" => "Data has been uploaded!"]);
            return redirect()->to(base_url('/admin/'));
        } catch (\Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());

            session()->setFlashdata('errors', ["message" => "Internal Server Error"]);
            session()->setFlashdata('input', $data);

            return redirect()->to(base_url('/admin/create'));
        }
    }

    /**
     *  Method GET | Route /admin/update/:id
     */
    public function getUpdate($id = '')
    {
        $blogPostModel = new BlogPosts();

        $data = $blogPostModel->where('pk_blog_id', $id)->first();
        if ($data === null) {
            // Data not found, you can handle this case differently or load a default view
            return view('errors/html/error_404');
        } else {
            $date = explode(" ", $data['created_at']);

            $data['created_at'] = $date[0];

            $datas = [
                "title" => 'Update Post | My Trip Memo',
                "data" => $data,
                "formtype" => 'edit',
            ];
            
            return view('admins/datamanagement', $datas);
        }
    }

    /**
     *  Method POST | Route /admin/update/:id
     */
    public function postUpdate($id = '')
    {
        $validation = \Config\Services::validation();
        $blogPostModel = new BlogPosts();

        $data = $blogPostModel->where('pk_blog_id', $id)->first();

        if ($data === null) {
            // Data not found, you can handle this case differently or load a default view
            return view('errors/html/error_404');
        } else {

            $validation->setRules([
                'title' => 'required',
                'created_at' => 'required',
                'address' => 'required',
                'thumbnail' => 'mime_in[thumbnail,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                'description' => 'required',
            ]);

            $newdata = [
                'title' => $this->request->getPost('title'),
                'created_at' => $this->request->getPost('created_at'),
                'address' => $this->request->getPost('address'),
                'description' => $this->request->getPost('description'),
            ];

            if (!($validation->run($data))) {
                session()->setFlashdata('errors', $validation->getErrors());
                session()->setFlashdata('input', $data);
                session()->setFlashdata('formtype', 'edit');
                return redirect()->to(base_url('/admin/update/' . $id));
            }

            $newimg = $this->request->getFile('thumbnail');

            if ($newimg != null) {
                if (file_exists(FCPATH . $data['thumbnail'])) {
                    unlink(FCPATH . $data['thumbnail']);
                }

                $filename = $newimg->getRandomName();
                $newimg->move('uploads/', $filename);

                $newdata['thumbnail'] = 'uploads/' . $filename;
            } else {
                $newdata['thumbnail'] = $data['thumbnail'];
            }

            $blogPostModel->update($id, $newdata);

            session()->setFlashdata('success', ["message" => "Data has been updated!"]);
            return redirect()->to('/admin/');
        }

        session()->setFlashdata('input', $data);
        session()->setFlashdata('formtype', 'edit');
        session()->setFlashdata('errors', ["message" => 'Data Not Found']);
        return redirect()->to(base_url('/admin/update/' . $id));
    }

    /**
     *  Method DELETE
     */
    public function delete($id = '')
    {
        $blogPostModel = new BlogPosts();

        $post = $blogPostModel->find($id);

        if ($post) {
            $postTitle = $post['title'];

            $imagePath = FCPATH . $post['thumbnail'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $success = $blogPostModel->delete($id);

            if ($success) {
                session()->setFlashdata('success', ["message" => "You have deleted $postTitle travel post."]);
            } else {
                session()->setFlashdata('errors', ["message" => "Failed to delete post."]);
            }
        } else {
            session()->setFlashdata('errors', ["message" => "Post not found."]);
        }

        return redirect()->back();
    }

    /**
     *  Method POST | Route /admin/logout
     */
    public function postLogout()
    {
        Auth::deleteAuth();

        return redirect()->to('/');
    }
}
