<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailImunisasiModel extends Model
{
    protected $table = 'detail_imunisasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_anak', 'nama_imunisasi' , 'tanggal_imunisasi' ,'id_anak' , 'no_kk'];
}