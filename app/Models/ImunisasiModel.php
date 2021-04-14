<?php

namespace App\Models;

use CodeIgniter\Model;

class ImunisasiModel extends Model
{
    protected $table = 'imunisasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_imunisasi', 'tanggal_imunisasi'];

    public function saveData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}
