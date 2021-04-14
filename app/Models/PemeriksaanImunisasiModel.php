<?php

namespace App\Models;

use CodeIgniter\Model;

class PemeriksaanImunisasiModel extends Model
{
    protected $table = 'pemeriksaan_imunisasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_anak','nama_anak','tanggal_imunisasi','nama_imunisasi','catatan','berat','tinggi','lingkarbadan','lingkarkepala','no_kk'];

    public function saveData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}
