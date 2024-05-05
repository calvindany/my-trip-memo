<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admins extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'pk_admin_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'password' => [
                'type'      => 'TEXT',
            ],
        ]);
        $this->forge->addKey('pk_admin_id', true);
        $this->forge->createTable('admins');
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}
