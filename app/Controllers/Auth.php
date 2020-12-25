<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\UserModel;


class Auth extends BaseController
{

    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // dd(session()->get('level'));
        if (session() != null) {
            // Fix this shit
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
            return redirect()->to(base_url('auth/login'));
        }
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }


    public function login_action()
    {

        $muser = new LoginModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $cek = $muser->get_data($email, $password);

        // User Level
        // 0 : orang tua
        // 1 : admin
        // 2 : bidan
        // 3 : kader

        if (($cek['user_email'] == $email) && ($cek['user_password'] == $password)) {
            if ($cek['level'] == 4) {
                session()->set('user_email', $cek['user_email']);
                session()->set('user_name', $cek['user_name']);
                session()->set('id', $cek['id']);
                session()->set('level', $cek['level']);
                session()->set('user_alamat', $cek['user_alamat']);
                session()->set('user_nik', $cek['user_nik']);
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
                return redirect()->to(base_url('bidan'));
            } else if ($cek['level'] == 3) {
                session()->set('user_email', $cek['user_email']);
                session()->set('user_name', $cek['user_name']);
                session()->set('id', $cek['id']);
                session()->set('level', $cek['level']);
                session()->set('user_alamat', $cek['user_alamat']);
                session()->set('user_nik', $cek['user_nik']);
                return redirect()->to(base_url('kader'));
            }
        } else {
            session()->setFlashdata('gagal', 'username / password salah');
            return redirect()->to(base_url('/'));
        }
    }

    public function register_user()
    {
        // $this->userModel->save([
        //     'user_email' => $this->request->getPost('email'),
        //     'user_name' => $this->request->getPost('username'),
        //     'user_password' => $this->request->getPost('password')
        // ]);

        $level = 0;
        $data = array(
            'user_email' => $this->request->getPost('email'),
            'user_name' => $this->request->getPost('username'),
            'user_password' => $this->request->getPost('password'),
            'user_nik' => $this->request->getPost('nik'),
            'user_alamat' => $this->request->getPost('alamat'),
            'level' => $level,
        );
        $this->userModel->saveData($data);
        session()->setFlashdata('berhasil', 'Berhasil Mendaftar silahkan login');
        return redirect()->to('/');
    }


    public function register_kader()
    {
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

    public function edit_users($id)
    {
        if (session()->get('level') == 1) {
            $this->userModel->editData([
                'id' => $id,
                'user_email' => $this->request->getPost('email'),
                'user_name' => $this->request->getPost('username'),
                'user_alamat' => $this->request->getPost('alamat'),
                'user_nik' => $this->request->getPost('nik'),
                'user_password' => $this->request->getPost('passowrd')
            ]);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to(base_url('/admin'));
        }
    }

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
        return redirect()->to(base_url('/'));
    }
    //--------------------------------------------------------------------

}
