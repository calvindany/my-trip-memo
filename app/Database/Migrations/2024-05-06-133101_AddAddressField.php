<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAddressField extends Migration
{
    public function up()
    {
        $this->forge->addColumn('blog_post', [
            'address' => [
                'type' => 'TEXT',
                'null' => false,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('blog_post', 'address');
    }
}
