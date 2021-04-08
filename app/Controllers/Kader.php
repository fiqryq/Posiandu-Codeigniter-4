<?php

namespace App\Controllers;

use App\Models\UserModel;

class Kader extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if (session()->get('level') != 3) {
            session()->setFlashdata('warning', 'Anda Belum Login !');
            return redirect()->to(base_url('/'));
        }

        $user = $this->userModel->getKader();

        $data = [
            'title' => "Data Kader",
            'user' => $user
        ];

        return view('kader/index', $data);
    }

    public function dataanak()
    {
        $data = ['title' => "Data Anak"];

        return view('kader/anak', $data);
    }

    public function dataorangtua()
    {
        $user = $this->userModel->getOrangtua();

        $data = [
            'title' => "Data Orangtua",
            'user' => $user
        ];

        return view('kader/orangtua', $data);
    }

    public function jadwalimunisasi()
    {
        $data = ['title' => "Jadwal Imunisasi"];

        return view('kader/jadwalimunisasi', $data);
    }

    public function jadwalposyandu()
    {
        $data = ['title' => "Jadwal Posyandu"];

        return view('kader/jadwalposyandu', $data);
    }

    public function laporan()
    {
        $data = ['title' => "Laporan"];

        return view('kader/laporan', $data);
    }

    public function edit_profile()
    {
        $data = ['title' => "Edit Profile"];
        return view('kader/editprofile', $data);
    }

    public function editProfile($id)
    {
        $data = array(
            'id' => $id,
            'user_email' => $this->request->getVar('email'),
            'user_name' => $this->request->getVar('username'),
            'user_password' => $this->request->getVar('password'),
            'user_alamat' => $this->request->getVar('alamat'),
            'user_nik' => $this->request->getVar('nik')
        );
        // dd($data);
        $this->userModel->save($data);
        session()->setFlashdata('berhasil', 'Berhasil mengubah profile , untuk melihat perubahan harap logout terlebih dahulu. ');
        return redirect()->to(base_url('kader/edit_Profile'));
    }

    //--------------------------------------------------------------------

}
