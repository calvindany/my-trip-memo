<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admins extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'password'    => password_hash('admin', PASSWORD_BCRYPT),
        ];

        // Simple Queries
        $this->db->query('INSERT INTO admins (username, password) VALUES(:username:, :password:)', $data);
    }
}
