<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAuthorIdAndCreateDate extends Migration
{
    public function up()
    {
        $this->forge->addColumn('blog_post', [
            'fk_admin_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'null'           => true,
            ],
        ]);

        $this->forge->addColumn('blog_post', [
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
        ]);
    }

    public function down()
    {
        // Drop created_at field
        $this->forge->dropColumn('table_name', 'created_at');

        // Drop author_id field
        $this->forge->dropColumn('table_name', 'fk_admin_id');
    }
}
