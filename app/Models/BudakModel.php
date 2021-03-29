<?php

namespace App\Models;

use CodeIgniter\Model;

class BudakModel extends Model
{
    protected $table = 'budak';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'umur', 'no_kk'];
}
