<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Bidan extends BaseController
{
    protected $artikelmodel;
    public function __construct()
    {
        $this->artikelmodel = new ArtikelModel();
    }

    public function index()
    {
        if (session()->get('level') == null) {
            session()->setFlashdata('warning', 'Anda Belum Login !');
            return redirect()->to(base_url('/'));
        }

        $data = ['title' => "Penyuluhan"];
        return view('bidan/index', $data);
    }

    public function artikel()
    {
        $data = ['title' => "Artikel"];
        return view('bidan/artikel', $data);
    }

    public function createarticle()
    {
        $title = ['title' => "tambah kader"];
        $date = date("Y/m/d");
        $penulis = session()->get('user_name');
        $data = array(
            'judul' => $this->request->getPost('judul'),
            'body' => $this->request->getPost('isiartikel'),
            'penulis' => $penulis,
            'created_at' => $date
        );
        $this->artikelmodel->saveArtikel($data);
        // dd($data);
        // Add Flash data session
        session()->setFlashdata('berhasil', 'Berhasil Menambahkan Artikel');
        return view('bidan/artikel', $title);
    }

    public function profile()
    {
        $data = ['title' => "Profile"];
        return view('bidan/profile', $data);
    }

    public function edit_profile()
    {
        $data = ['title' => "Edit Profile"];
        return view('bidan/editprofile', $data);
    }
}
    //--------------------------------------------------------------------