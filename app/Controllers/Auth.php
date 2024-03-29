<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\UserModel;
use App\Models\KeluargaModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $KeluargaModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->KeluargaModel = new KeluargaModel();
    }

    public function index()
    {
        $data = ['title' => "Login"];

        // Membatasi route sesuai role
        if (session() != null) {
            if (session()->get('level') == 4) {
                return redirect()->to(base_url('/user'));
            } elseif (session()->get('level') == 1) {
                return redirect()->to(base_url('/admin'));
            } elseif (session()->get('level') == 2) {
                return redirect()->to(base_url('/bidan'));
            } elseif (session()->get('level') == 3) {
                return redirect()->to(base_url('/kader'));
            }
        } else {
            // jika kondisi tidak terpenuhi maka akan redurect ke login view
            return redirect()->to(base_url('/home/index'));
        }
        return view('/home/index', $data);
    }

    public function register()
    {
        session();
        $data = [
            'title' => "Register",
            'validation' => \Config\Services::Validation()
        ];
        return view('auth/register', $data);
    }

    // Fungsi Login
    public function login_action()
    {

        $muser = new LoginModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $cek = $muser->get_data($email, $password);

        // User Level
        // 4 : orang tua
        // 1 : admin
        // 2 : bidan
        // 3 : kader

        // Cek validasi data login untuk masing masing role
        if (($cek['user_email'] == $email) && ($cek['user_password'] == $password)) {
            if ($cek['level'] == 4) {
                session()->set('user_email', $cek['user_email']);
                session()->set('user_name', $cek['user_name']);
                session()->set('id', $cek['id']);
                session()->set('level', $cek['level']);
                session()->set('user_alamat', $cek['user_alamat']);
                session()->set('user_nik', $cek['user_nik']);
                session()->set('user_kk', $cek['user_kk']);
                session()->set('user_phone', $cek['user_phone']);
                return redirect()->to(base_url('user'));
            } else if ($cek['level'] == 1) {
                session()->set('user_email', $cek['user_email']);
                session()->set('user_name', $cek['user_name']);
                session()->set('id', $cek['id']);
                session()->set('level', $cek['level']);
                session()->set('user_alamat', $cek['user_alamat']);
                session()->set('user_nik', $cek['user_nik']);
                return redirect()->to(base_url('admin'));
            } else if ($cek['level'] == 2) {
                session()->set('user_email', $cek['user_email']);
                session()->set('user_name', $cek['user_name']);
                session()->set('id', $cek['id']);
                session()->set('level', $cek['level']);
                session()->set('user_alamat', $cek['user_alamat']);
                session()->set('user_nik', $cek['user_nik']);
                session()->set('user_phone', $cek['user_phone']);
                return redirect()->to(base_url('bidan'));
            } else if ($cek['level'] == 3) {
                session()->set('user_email', $cek['user_email']);
                session()->set('user_name', $cek['user_name']);
                session()->set('id', $cek['id']);
                session()->set('level', $cek['level']);
                session()->set('user_alamat', $cek['user_alamat']);
                session()->set('user_nik', $cek['user_nik']);
                session()->set('user_phone', $cek['user_phone']);
                return redirect()->to(base_url('kader'));
            }
        } else {
            session()->setFlashdata('gagal', 'username / password salah');
            return redirect()->to(base_url('/home/index'));
        }
    }


    public function register_user()
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
                    'min_length' => '{field} harus terdiri dari 16 angka',
                    'numeric' => '{field} hanya berisi angka'
                ]
            ],
            'kk' => [
                'rules' => 'required|max_length[16]|numeric|min_length[15]',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'max_length' => 'masukan {field} valid.',
                    'min_length' => '{field} harus terdiri dari 16 angka',
                    'numeric' => '{field} hanya berisi angka',
                ]
            ],
            'phone' => [
                'rules' => 'required|max_length[12]|numeric|min_length[10]',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'max_length' => 'masukan {field} valid.',
                    'min_length' => '{field} harus terdiri dari 10 - 12 angka',
                    'numeric' => '{field} hanya berisi angka',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
        ])) {

            return redirect()->to('register')->withInput();
        }

        $level = 4;
        $data = array(
            'user_email' => $this->request->getPost('email'),
            'user_name' => $this->request->getPost('username'),
            'user_password' => $this->request->getPost('password'),
            'user_phone' => $this->request->getPost('phone'),
            'user_nik' => $this->request->getPost('nik'),
            'user_kk' => $this->request->getPost('kk'),
            'user_alamat' => $this->request->getPost('alamat'),
            'is_parent' => $this->request->getPost('role'),
            'level' => $level,
        );
        $this->userModel->saveData($data);

        // $keluarga = array(
        //     'no_kk' => $this->request->getPost('kk')
        // );
        // $this->KeluargaModel->save($keluarga);

        session()->setFlashdata('berhasil', 'Berhasil Mendaftar silahkan login');
        return redirect()->to('/home/index');
    }

    // edit user for admins
    public function edit_users($id)
    {
        $data = array(
            'id' => $id,
            'user_email' => $this->request->getVar('email'),
            'user_name' => $this->request->getVar('username'),
            'user_password' => $this->request->getVar('password'),
            'user_alamat' => $this->request->getVar('alamat'),
            'user_phone' => $this->request->getVar('phone'),
            'user_nik' => $this->request->getVar('nik')
        );

        $this->userModel->save($data);
        session()->setFlashdata('berhasil', 'Berhasil Mengupdate data');
        return redirect()->to(base_url('/admin'));
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
        return redirect()->to(base_url('user/edit_Profile'));
    }

    // Fungsi delete data user berdasarkan id user
    public function delete_user($id)
    {
        if (session()->get('level' == 1)) {
            $this->userModel->delete($id);
            session()->setFlashdata('pesan', 'Data Berhasil Dihapus');

            return redirect()->to(base_url('/admin'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('home/index'));
    }
    //--------------------------------------------------------------------

}