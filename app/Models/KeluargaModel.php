<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluargaModel extends Model
{
    protected $table = 'keluarga';
    protected $primaryKey = 'id';
    protected $allowedFields = ['no_kk'];

}
