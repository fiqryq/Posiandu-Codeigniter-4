<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPosianduModel extends Model
{
    protected $table = 'detail_posiandu';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_anak','tanggal_posiandu' ,'id_anak' , 'no_kk'];
}