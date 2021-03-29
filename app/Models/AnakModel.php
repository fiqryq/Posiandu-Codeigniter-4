<?php

namespace App\Models;

use CodeIgniter\Model;

class AnakModel extends Model
{
    protected $table = 'anak';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_anak', 'umur_anak', 'tinggi_anak', 'berat_anak', 'lingkar_kepala', 'jenis_kelamin', 'no_kk'];

    public function getDetail($no_kk)
    {
        $data = $this->db->table($this->table)->getWhere(['no_kk' => $no_kk])->getResultObject();
        return $data;
    }
}
