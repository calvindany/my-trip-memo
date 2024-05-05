<?php

namespace App\Models;

use CodeIgniter\Model;

class Admins extends Model
{
    protected $table            = 'admins';
    protected $primaryKey       = 'pk_admin_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password'];
}
