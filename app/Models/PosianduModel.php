<?php

namespace App\Models;

use CodeIgniter\Model;

class PosianduModel extends Model
{
    protected $table = 'posiandu';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tanggal_posiandu', 'waktu_mulai','waktu_selesai','hari'];

    public function saveData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}