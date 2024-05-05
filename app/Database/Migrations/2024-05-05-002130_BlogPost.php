<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BlogPost extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'pk_blog_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'thumbnail' => [
                'type'      => 'TEXT',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('pk_blog_id', true);
        $this->forge->createTable('blog_post');
    }

    public function down()
    {
        $this->forge->dropTable('blog_post');
    }
}
