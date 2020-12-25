<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['username', 'email', 'password', 'nik', 'alamat'];

    public function saveData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function editData($data)
    {
        $query = $this->db->table($this->table)->set($data);
        return $query;
    }
}
