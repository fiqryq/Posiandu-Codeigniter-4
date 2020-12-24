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

    // Get data for table bidan
    public function getArticle()
    {
        $query = $this->db->table($this->table);
        $query->where('id_penulis ==', 2);
        return $query;
    }
}
