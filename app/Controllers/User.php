<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\PenyuluhanModel;
use App\Models\AnakModel;
use App\Models\ImunisasiModel;
use App\Models\PemeriksaanImunisasiModel;
use App\Models\PesanModel;


class User extends BaseController
{
    protected $artikelmodel;
    protected $penyuluhanmodel;
    protected $anakmodel;
    protected $imunisasiModel;
    protected $PemeriksaanImunisasiModel;
    protected $PesanModel;

    public function __construct()
    {
        $this->artikelmodel = new ArtikelModel();
        $this->penyuluhanmodel = new PenyuluhanModel();
        $this->anakmodel = new AnakModel();
        $this->imunisasiModel = new ImunisasiModel();
        $this->PemeriksaanImunisasiModel = new PemeriksaanImunisasiModel();
        $this->PesanModel = new PesanModel();
    }

    public function index()
    {
        if (session()->get('level') != 4) {
            session()->setFlashdata('warning', 'Anda Belum Login !');
            return redirect()->to(base_url('/home/index'));
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
        $kk = session()->get('user_kk');
        $imunisasi = $this->imunisasiModel->findAll();
        $pemeriksaan = $this->PemeriksaanImunisasiModel->where('no_kk',$kk)->findAll();
        $data = [
            'title' => "Jadwal Imunisasi",
            'imunisasi' => $imunisasi,
            'pemeriksaan' => $pemeriksaan
        ];
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
            'user_kk' => $this->request->getVar('kk'),
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

    public function pesan()
    {
        $iduser = session()->get('id');
        $pesanterkirim = $this->PesanModel->where('id_pengirim', $iduser)->findAll();
        $pesanmasuk = $this->PesanModel->where('id_penerima', $iduser)->findAll();
        $data = [
            'title' => "Pesan",
            'pesanterkirim' => $pesanterkirim,
            'pesanmasuk' => $pesanmasuk
        ];
        return view('user/pesan', $data);
    }

    public function sendmessage(){
        $date = date("Y/m/d");
        $iduser = session()->get('id');
        $data = array(
            'tanggal' => $date,
            'nama_pengirim' => $this->request->getVar('nama_pengirim'),
            'pesan' => $this->request->getVar('pesan'),
            'id_penerima' => 2,
            'id_pengirim' => $iduser,
            'role' => 4
        );
        $this->PesanModel->save($data);
        session()->setFlashdata('berhasil', 'Berhasil mengirim pesan');
        return redirect()->to(base_url('user/pesan'));
    }
}
