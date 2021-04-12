<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ImunisasiModel;
class Kader extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->imunisasiModel = new ImunisasiModel();
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
        $imunisasi = $this->imunisasiModel->findAll();

        $data = [
            'title' => "Jadwal Imunisasi",
            'imunisasi' => $imunisasi
        ];

        return view('kader/jadwalimunisasi', $data);
    }

    public function addimunisasi(){
        $oridate = $this->request->getVar('date');
        $newdate = date('y-m-d', strtotime($oridate));
        $data = array(
            'nama_imunisasi' => $this->request->getVar('imunisasi'),
            'date' => $newdate
        );
        
        $this->imunisasiModel->save($data);
        session()->setFlashdata('tambah', 'berhasil tambah imunisasi');
        return redirect()->to('jadwalimunisasi');
    }

    public function editimunisasi($id){
        $oridate = $this->request->getVar('date');
        $newdate = date('y-m-d', strtotime($oridate));
        $data = array(
            'id' => $id,
            'nama_imunisasi' => $this->request->getVar('imunisasi'),
            'date' => $newdate
        );
    
        $this->imunisasiModel->save($data);
        session()->setFlashdata('update', 'berhasil update imunisasi');
        return redirect()->to('/kader/jadwalimunisasi');
    }

    public function deleteImunisasi($id){
        $this->imunisasiModel->delete($id);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');

        return redirect()->to(base_url('kader/jadwalimunisasi'));
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
