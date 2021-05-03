<?php

namespace App\Models;

use CodeIgniter\Model;

class PemeriksaanposianduModel extends Model
{
    protected $table = 'pemeriksaan_posiandu';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_anak','nama_anak','tanggal_posiandu','catatan','berat','tinggi','lingkarbadan','lingkarkepala','no_kk'];

    public function getData($id){
        $data = $this->db->table($this->table)->getWhere(['id_anak' => $id])->getResultObject();
        return $data;
    }
}