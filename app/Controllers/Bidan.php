<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\PenyuluhanModel;
use App\Models\UserModel;


class Bidan extends BaseController
{
    protected $artikelmodel;
    protected $penyuluhanmodel;

    public function __construct()
    {
        $this->artikelmodel = new ArtikelModel();
        $this->penyuluhanmodel = new PenyuluhanModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if (session()->get('level') != 2) {
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
        $artikeldata = $this->artikelmodel->findAll();
        $data = [
            'title' => "Artikel",
            'artikel' => $artikeldata
        ];
        return view('bidan/artikel', $data);
    }

    public function createarticle()
    {
        $date = date("Y/m/d");
        $penulis = session()->get('user_name');
        $id_penulis = session()->get('id');
        $data = array(
            'judul' => $this->request->getPost('judul'),
            'body' => $this->request->getPost('isiartikel'),
            'penulis' => $penulis,
            'created_at' => $date,
            'id_penulis' => $id_penulis
        );
        $this->artikelmodel->saveArtikel($data);

        session()->setFlashdata('berhasil', 'Berhasil Menambahkan Artikel');
        return redirect()->to(base_url('bidan/artikel'));
    }

    public function editarticle($id)
    {
        $date = date("Y/m/d");
        $penulis = session()->get('user_name');
        $id_penulis = session()->get('id');

        $data = array(
            'id' => $id,
            'judul' => $this->request->getPost('judul'),
            'body' => $this->request->getPost('isiartikel'),
            'penulis' => $penulis,
            'created_at' => $date,
            'id_penulis' => $id_penulis
        );
        $this->artikelmodel->save($data);

        session()->setFlashdata('update', 'Berhasil Mengupdate Artikel');
        return redirect()->to(base_url('bidan/artikel'));
    }

    public function addpenyuluhan()
    {
        // Convert oridate ('d-m-y')
        $oridate = $this->request->getVar('date');
        $newdate = date('y-m-d', strtotime($oridate));
        $data = array(
            'kegiatan' => $this->request->getVar('kegiatan'),
            'date' => $newdate
        );
        $this->penyuluhanmodel->save($data);

        session()->setFlashdata('update', 'Berhasil mengupdate penyluhan');
        return redirect()->to('/bidan/index');
    }


    public function editpenyuluhan($id)
    {
        // Convert oridate ('d-m-y')
        $oridate = $this->request->getVar('date');
        $newdate = date('y-m-d', strtotime($oridate));
        $data = array(
            'id' => $id,
            'kegiatan' => $this->request->getVar('kegiatan'),
            'date' => $newdate
        );
        $this->penyuluhanmodel->save($data);

        session()->setFlashdata('berhasil', 'Berhasil membuat penyluhan');
        return redirect()->to('/bidan/index');
    }

    public function delete_penyuluhan($id)
    {
        $this->penyuluhanmodel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');

        return redirect()->to(base_url('/bidan'));
    }

    public function delete_artikel($id)
    {
        $this->artikelmodel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/bidan/artikel'));
    }

    
    public function profile()
    {
        $data = ['title' => "Profile"];
        return view('bidan/profile', $data);
    }

    public function edit_Profile()
    {
        $data = ['title' => "Edit Profile"];
        return view('bidan/editprofile', $data);
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
        $this->userModel->save($data);
        session()->setFlashdata('berhasil', 'Berhasil mengubah profile , untuk melihat perubahan harap logout terlebih dahulu. ');
        return redirect()->to(base_url('bidan/edit_Profile'));
    }

    public function laporan()
    {
        $data = ['title' => "laporan"];
        return view('bidan/laporan', $data);
    }

    public function pesan()
    {
        $data = ['title' => "pesan"];
        return view('bidan/pesan', $data);
    }
}
    //--------------------------------------------------------------------