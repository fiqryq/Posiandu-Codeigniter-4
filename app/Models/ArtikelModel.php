<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'body'];

    public function saveArtikel($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    // Get data for table bidan
    public function getArticle()
    {
        return $this->where(['id_penulis' => 2])->first();
    }

    public function getDetail($id)
    {
        $data = $this->db->table($this->table)->getWhere(['id' => $id])->getResultObject();
        return $data;
    }
}
