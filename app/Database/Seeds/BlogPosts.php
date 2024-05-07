<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BlogPosts extends Seeder
{
    public function run()
    {
        $data = [
            'title' => 'Trip to Japan', 
            'thumbnail' => 'uploads/1715100669_40fc4b28bd286aef3025.png', 
            'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque at fermentum orci. Duis a auctor orci. Mauris vel ante a nulla posuere bibendum. Quisque ullamcorper scelerisque erat, fringilla pretium lacus aliquam vel. Quisque rutrum, mi in efficitur semper, libero magna porttitor tortor, vel tempus leo ex non elit. Quisque ut turpis scelerisque, semper velit eu, consequat dolor. Praesent porta non diam ut dignissim. Sed sit amet orci tempor, dignissim leo et, auctor ex. Nulla id quam quam.</p><p><br></p><p>Pellentesque placerat at ipsum sit amet venenatis. Proin vitae commodo orci, vitae accumsan lorem. Suspendisse sed tortor at mauris convallis lacinia. Cras erat odio, tincidunt vitae eros fringilla, convallis malesuada nulla. Vivamus volutpat est odio, sed placerat nisl gravida id. Vivamus in lectus nunc. Sed cursus neque quis odio facilisis consequat.</p>', 
            'address' => 'Japan Address Street', 
            'fk_admin_id' => 1, 
            'created_at' => date('Y-m-d H:i:s')
        ];
        $data2 = [
            'title' => 'Trip to Korea', 
            'thumbnail' => 'uploads/1715100921_f1b00144db4be3763e0a.png', 
            'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque at fermentum orci. Duis a auctor orci. Mauris vel ante a nulla posuere bibendum. Quisque ullamcorper scelerisque erat, fringilla pretium lacus aliquam vel. Quisque rutrum, mi in efficitur semper, libero magna porttitor tortor, vel tempus leo ex non elit. Quisque ut turpis scelerisque, semper velit eu, consequat dolor. Praesent porta non diam ut dignissim. Sed sit amet orci tempor, dignissim leo et, auctor ex. Nulla id quam quam.</p><p><br></p><p>Pellentesque placerat at ipsum sit amet venenatis. Proin vitae commodo orci, vitae accumsan lorem. Suspendisse sed tortor at mauris convallis lacinia. Cras erat odio, tincidunt vitae eros fringilla, convallis malesuada nulla. Vivamus volutpat est odio, sed placerat nisl gravida id. Vivamus in lectus nunc. Sed cursus neque quis odio facilisis consequat.<br></p>', 
            'address' => 'Korean Address Street', 
            'fk_admin_id' => 1, 
            'created_at' => date('Y-m-d H:i:s')
        ];
        $data3 = [
            'title' => 'Jakarta Center City of Indonesia', 
            'thumbnail' => 'uploads/1715101014_6be57e9f956f5c0705a3.jpg', 
            'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque at fermentum orci. Duis a auctor orci. Mauris vel ante a nulla posuere bibendum. Quisque ullamcorper scelerisque erat, fringilla pretium lacus aliquam vel. Quisque rutrum, mi in efficitur semper, libero magna porttitor tortor, vel tempus leo ex non elit. Quisque ut turpis scelerisque, semper velit eu, consequat dolor. Praesent porta non diam ut dignissim. Sed sit amet orci tempor, dignissim leo et, auctor ex. Nulla id quam quam.</p><p><br></p><p>Pellentesque placerat at ipsum sit amet venenatis. Proin vitae commodo orci, vitae accumsan lorem. Suspendisse sed tortor at mauris convallis lacinia. Cras erat odio, tincidunt vitae eros fringilla, convallis malesuada nulla. Vivamus volutpat est odio, sed placerat nisl gravida id. Vivamus in lectus nunc. Sed cursus neque quis odio facilisis consequat.</p>', 
            'address' => 'Jalan Brembes No. 8', 
            'fk_admin_id' => 1, 
            'created_at' => date('Y-m-d H:i:s')
        ];

        // Simple Queries
        $this->db->query('INSERT INTO blog_post (title, thumbnail, description, address, fk_admin_id, created_at) VALUES(:title:, :thumbnail:, :description:, :address:, :fk_admin_id:, :created_at:)', $data);
        $this->db->query('INSERT INTO blog_post (title, thumbnail, description, address, fk_admin_id, created_at) VALUES(:title:, :thumbnail:, :description:, :address:, :fk_admin_id:, :created_at:)', $data2);
        $this->db->query('INSERT INTO blog_post (title, thumbnail, description, address, fk_admin_id, created_at) VALUES(:title:, :thumbnail:, :description:, :address:, :fk_admin_id:, :created_at:)', $data3);
    }
}
