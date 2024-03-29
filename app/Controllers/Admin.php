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
            return redirect()->to(base_url('/home/index'));
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

      // edit user profile for user ortu
      public function editProfile($id)
      {
          $data = array(
              'id' => $id,
              'user_email' => $this->request->getVar('email'),
              'user_name' => $this->request->getVar('username'),
              'user_password' => $this->request->getVar('password'),
              'user_alamat' => $this->request->getVar('alamat'),
              'user_phone' => $this->request->getVar('phone'),
              'user_kk' => $this->request->getVar('kk'),
              'user_nik' => $this->request->getVar('nik')
          );
          $this->userModel->save($data);
          session()->setFlashdata('berhasil', 'Berhasil mengubah profile , untuk melihat perubahan harap logout terlebih dahulu. ');
          return redirect()->to(base_url('admin/edit_Profile'));
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
                    'rules' => 'required|max_length[16]|numeric|min_length[15]',
                    'errors' => [
                        'required' => '{field} harus di isi.',
                        'max_length' => 'masukan {field} valid.',
                        'numeric' => '{field} hanya berisi angka',
                        'min_length' => 'masukan {field} valid'
                    ]
                ],
                'kk' => [
                    'rules' => 'required|max_length[16]|numeric|min_length[15]',
                    'errors' => [
                        'required' => '{field} harus di isi.',
                        'max_length' => 'masukan {field} valid.',
                        'numeric' => '{field} hanya berisi angka',
                        'min_length' => 'masukan {field} valid'
                    ]
                ],
                'phone' => [
                    'rules' => 'required|max_length[12]|numeric|min_length[10]',
                    'errors' => [
                        'required' => '{field} harus di isi.',
                        'max_length' => 'masukan {field} valid.',
                        'numeric' => '{field} hanya berisi angka',
                        'min_length' => 'masukan {field} valid'
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
            'user_kk' => $this->request->getPost('kk'),
            'user_phone' => $this->request->getPost('phone'),
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
                'rules' => 'required|max_length[16]|numeric|min_length[15]',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'max_length' => 'masukan {field} valid.',
                    'numeric' => '{field} hanya berisi angka',
                    'min_length' => 'masukan {field} valid'
                ]
            ],
            'kk' => [
                'rules' => 'required|max_length[16]|numeric|min_length[15]',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'max_length' => 'masukan {field} valid.',
                    'numeric' => '{field} hanya berisi angka',
                    'min_length' => 'masukan {field} valid'
                ]
            ],
            'phone' => [
                'rules' => 'required|max_length[12]|numeric|min_length[10]',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'max_length' => 'masukan {field} valid.',
                    'numeric' => '{field} hanya berisi angka',
                    'min_length' => 'masukan {field} valid'
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
    
        $level = 2;
        $data = array(
            'user_email' => $this->request->getPost('email'),
            'user_name' => $this->request->getPost('username'),
            'user_password' => $this->request->getPost('password'),
            'user_nik' => $this->request->getPost('nik'),
            'user_kk' => $this->request->getPost('kk'),
            'user_phone' => $this->request->getPost('phone'),
            'user_alamat' => $this->request->getPost('alamat'),
            'level' => $level,
        );
        $this->userModel->saveData($data);
        session()->setFlashdata('berhasil', 'Berhasil Menambahkan Bidan');
        return redirect()->to(base_url('admin/addbidan'));
    }
}
    //--------------------------------------------------------------------