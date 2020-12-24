<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\PenyuluhanModel;

class Bidan extends BaseController
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
        if (session()->get('level') == null) {
            session()->setFlashdata('warning', 'Anda Belum Login !');
            return redirect()->to(base_url('/'));
        }

        $penyuluhan = $this->penyuluhanmodel->findAll();
        $data = [
            'title' => "Penyuluhan",
            'penyuluhan' => $penyuluhan
        ];
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

    public function addpenyuluhan()
    {
        $title = ['title' => "Penyuluhan"];
        $idp = "tes";
        $data = array(
            'kegiatan' => $this->request->getPost('kegiatan'),
            'date' => $this->request->getPost('date')
        );
        $this->penyuluhanmodel->saveData($data);
        session()->setFlashdata('berhasil', 'Berhasil menambahkan data penyuluhan');
        return view('bidan/penyuluhan', $title);
    }

    public function delete_penyuluhan($id)
    {
        if (session()->get('level' == 2)) {
            $this->penyuluhanmodel->delete($id);
            session()->setFlashdata('pesan', 'Data Berhasil Dihapus');

            return redirect()->to(base_url('/bidan'));
        }
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