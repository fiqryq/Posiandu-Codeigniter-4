<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\PenyuluhanModel;

class User extends BaseController
{
    protected $artikelmodel;
    protected $penyuluhanmodel;

    public function __construct()
    {
        $this->artikelmodel = new ArtikelModel();
        $this->penyuluhanmodel = new PenyuluhanModel();
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
        $data = ['title' => "Perkembangan Anak"];
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

    public function detail()
    {
        $data = ['title' => "Detail Anak"];
        return view('user/detail', $data);
    }
}
