<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'nik', 'alamat'];

    // Save data using model
    public function saveData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    // Get list data kader
    public function getKader()
    {
        $level = 3;
        $data = $this->db->table($this->table)->getWhere(['level' => $level])->getResultObject();
        return $data;
    }

    // Get list data admin
    public function getAdmin()
    {
        $level = 1;
        $data = $this->db->table($this->table)->getWhere(['level' => $level])->getResultObject();
        return $data;
    }

    // Get list data orang tua
    public function getOrangtua()
    {
        $level = 4;
        $data = $this->db->table($this->table)->getWhere(['level' => $level])->getResultObject();
        return $data;
    }

    // Get list data bidan
    public function getBidan()
    {
        $level = 4;
        $data = $this->db->table($this->table)->getWhere(['level' => $level])->getResultObject();
        return $data;
    }
}
