<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    // initial __construct untuk user model agar bisa di panggil di function lain | $this->namamodel->fungsiquery/fungsi dari model
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // Membatasi agar user harus login dulu untuk masuk dashboard sesuai role.
        if (session()->get('level') != 1) {
            session()->setFlashdata('warning', 'Anda Belum Login !');
            return redirect()->to(base_url('/'));
        }

        // Fungsi menampilkan semua data SELECT * FROM table / fungsi bawaan ci menggunakan findAll()
        $user = $this->userModel->findAll();
        $data = [
            'title' => "admin",
            'user' => $user
        ];
        return view('admin/index', $data);
    }

    public function addkader()
    {
        session();
        $data = [
            'title' => "Tambah kader",
            'validation' => \Config\Services::Validation()
        ];
        return view('admin/addkader', $data);
    }

    public function addbidan()
    {
        session();
        $data = [
            'title' => "Tambah Bidan",
            'validation' => \Config\Services::Validation()
        ];
        return view('admin/addbidan', $data);
    }

    public function profile()
    {
        $data = ['title' => "Profile"];
        return view('admin/profile', $data);
    }

    public function edit_profile()
    {
        $data = ['title' => "Edit Profile"];
        return view('admin/editprofile', $data);
    }


    public function register_kader()
    {
              // Form validation
              if (!$this->validate([
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus di isi.'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} harus di isi.',
                        'valid_email' => 'masukan {field} yang valid.'
                    ]
                ],
                'nik' => [
                    'rules' => 'required|max_length[16]|numeric',
                    'errors' => [
                        'required' => '{field} harus di isi.',
                        'max_length' => 'masukan {field} valid.',
                        'numeric' => '{field} hanya berisi angka'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus di isi.'
                    ]
                ],
            ])) {
    
                return redirect()->to('addkader')->withInput();
            }

        $level = 3;
        $data = array(
            'user_email' => $this->request->getPost('email'),
            'user_name' => $this->request->getPost('username'),
            'user_password' => $this->request->getPost('password'),
            'user_nik' => $this->request->getPost('nik'),
            'user_alamat' => $this->request->getPost('alamat'),
            'level' => $level,
        );
        $this->userModel->saveData($data);
        session()->setFlashdata('berhasil', 'Berhasil Menambahkan Kader');
        return redirect()->to(base_url('admin/addkader'));
    }

    public function register_bidan()
    {
          // Form validation
          if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'valid_email' => 'masukan {field} yang valid.'
                ]
            ],
            'nik' => [
                'rules' => 'required|max_length[16]|numeric',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'max_length' => 'masukan {field} valid.',
                    'numeric' => '{field} hanya berisi angka'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
        ])) {

            return redirect()->to('addbidan')->withInput();
        }

        $level = 2;
        $data = array(
            'user_email' => $this->request->getPost('email'),
            'user_name' => $this->request->getPost('username'),
            'user_password' => $this->request->getPost('password'),
            'user_nik' => $this->request->getPost('nik'),
            'user_alamat' => $this->request->getPost('alamat'),
            'level' => $level,
        );
        $this->userModel->saveData($data);
        session()->setFlashdata('berhasil', 'Berhasil Menambahkan Bidan');
        return redirect()->to(base_url('admin/addbidan'));
    }
}
    //--------------------------------------------------------------------
