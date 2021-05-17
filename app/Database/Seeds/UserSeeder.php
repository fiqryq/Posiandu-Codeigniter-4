<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
        public function run()
        {
                $data = [
                        'user_email' => 'admin@gmail.com',
                        'user_name'  => 'admin',
                        'user_password'  => '12345678',
                        'user_alamat'  => 'Bandung',
                        'user_phone'  => '123456789012',
                        'user_nik'  => '123456789098765',
                        'user_kk'  => '123456789098765',
                        'level'  => 1,
                        'is_parent'  => 0
                ];
                // Using Query Builder
                $this->db->table('user')->insert($data);
        }
}