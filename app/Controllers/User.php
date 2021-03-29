<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\PenyuluhanModel;
use App\Models\AnakModel;

class User extends BaseController
{
    protected $artikelmodel;
    protected $penyuluhanmodel;
    protected $anakmodel;

    public function __construct()
    {
        $this->artikelmodel = new ArtikelModel();
        $this->penyuluhanmodel = new PenyuluhanModel();
        $this->anakmodel = new AnakModel();
    }

    public function index()
    {
        if (session()->get('level') != 4) {
            session()->setFlashdata('warning', 'Anda Belum Login !');
            return redirect()->to(base_url('/'));
        }

        $artikel = $this->artikelmodel->findAll();

        $data = [
            'title' => "Panduan Posyandu",
            'artikel' => $artikel
        ];
        return view('user/index', $data);
    }

    public function profile()
    {
        $data = ['title' => "Profile"];
        return view('user/profile', $data);
    }

    public function perkembangan()
    {
        $kk = session()->get('user_kk');
        $anak = $this->anakmodel->where('no_kk', $kk)->findAll();
        $data = [
            'title' => "Perkembangan Anak",
            'anak' => $anak
        ];
        return view('user/perkembangan', $data);
    }

    public function jadwalimunisasi()
    {
        $data = ['title' => "Jadwal Imunisasi"];
        return view('user/jadwalimunisasi', $data);
    }

    public function jadwalposyandu()
    {
        $data = ['title' => "Jadwal Podyandy"];
        return view('user/jadwalposyandu', $data);
    }

    public function penyuluhan()
    {
        $penyuluhan = $this->penyuluhanmodel->findAll();
        $data = [
            'title' => "Penyuluhan",
            'penyuluhan' => $penyuluhan
        ];

        return view('user/penyuluhan', $data);
    }

    public function detailarticle($id)
    {
        $artikel = $this->artikelmodel->getDetail($id);
        $data = [
            'title' => "Artikel",
            'artikel' => $artikel
        ];
        // dd($data);
        return view('user/artikeldetail', $data);
    }

    public function edit_profile()
    {
        $data = ['title' => "Edit Profile"];
        return view('user/editprofile', $data);
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
        return redirect()->to(base_url('user/edit_Profile'));
    }

    public function detail()
    {
        $data = ['title' => "Detail Anak"];
        return view('user/detail', $data);
    }
}
