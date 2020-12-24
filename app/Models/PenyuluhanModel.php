<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyuluhanModel extends Model
{
    protected $table = 'penyuluhan';
    protected $allowedFields = ['id_penyuluhan', 'kegiatan', 'date'];

    public function saveData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}
