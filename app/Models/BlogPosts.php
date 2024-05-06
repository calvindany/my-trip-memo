<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogPosts extends Model
{
    protected $table            = 'blog_post';
    protected $primaryKey       = 'pk_blog_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'thumbnail', 'description', 'address', 'fk_admin_id', 'created_at'];
}
