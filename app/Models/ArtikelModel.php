<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $allowedFields = ['judul', 'body'];

    public function saveArtikel($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}
