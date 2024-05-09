<?php

namespace App\Controllers;

use App\Models\BlogPosts;
use App\Models\Admins;

class UsersController extends BaseController
{
    public function index(): string
    {
        // var_dump('aa');
        return view('users/home');
    }

    public function getDetail($id = ''): string
    {
        $blogPostModel = new BlogPosts();
        $adminsModel = new Admins();

        $travelDetail = $blogPostModel->find($id);

        if ($travelDetail) {
            $adminDetail = $adminsModel->find($travelDetail['fk_admin_id']);
            
            if ($adminDetail) {
                $travelDetail['username'] = $adminDetail['username'];
            }
        }

        $data = [
            'travelDetail' => $travelDetail
        ];

        return view('users/travel-detail', $data);
    }
}
