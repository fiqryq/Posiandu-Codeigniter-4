<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_anak','nama_anak','tanggal_kegiatan','jenis_kegiatan','berat','tinggi','lingkarbadan','lingkarkepala'];
}