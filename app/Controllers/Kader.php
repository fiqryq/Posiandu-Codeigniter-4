<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ImunisasiModel;
use App\Models\DetailImunisasiModel;
use App\Models\AnakModel;
use App\Models\PemeriksaanImunisasiModel;


class Kader extends BaseController
{
    protected $anakModel;
    protected $userModel;
    protected $detailImunisasi;
    protected $imunisasiModel;
    protected $PemeriksaanImunisasiModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->imunisasiModel = new ImunisasiModel();
        $this->detailImunisasi = new DetailImunisasiModel();
        $this->anakModel = new AnakModel();
        $this->PemeriksaanImunisasiModel = new PemeriksaanImunisasiModel();
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

    public function dataanak($slug)
    {
        $detail = $this->anakModel->where('no_kk', $slug)->findAll();
        $data = [
            'title' => "Data Anak",
            'detail' => $detail
        ];
        return view('kader/anak', $data);
    }

    public function datakeluarga()
    {
        $user = $this->userModel->getOrangtua();
        $data = [
            'title' => "Data Orangtua",
            'user' => $user
        ];

        return view('kader/keluarga', $data);
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
            'tanggal_imunisasi' => $newdate
        );

        $this->imunisasiModel->save($data);
        $anak = $this->anakModel->findAll();

        foreach($anak as $key){
            $this->detailImunisasi->save([
                'no_kk' => $key['no_kk'],
                'nama_anak' => $key['nama_anak'],
                'nama_imunisasi' => $this->request->getVar('imunisasi'),
                'tanggal_imunisasi' => $newdate,
                'id_anak' => $key['id']
            ]);
        }

        session()->setFlashdata('tambah', 'berhasil tambah imunisasi');
        return redirect()->to('jadwalimunisasi');
    }

    public function editimunisasi($id){
        $oridate = $this->request->getVar('date');
        $newdate = date('y-m-d', strtotime($oridate));
        $data = array(
            'id' => $id,
            'nama_imunisasi' => $this->request->getVar('imunisasi'),
            'tanggal_imunisasi' => $newdate
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

    public function detailImunisasi($slug)
    {
        $detail = $this->detailImunisasi->where('tanggal_imunisasi', $slug)->findAll();
        $data = [
            'title' => "Detail imunisasi",
            'detail' => $detail
        ];

        return view('kader/detailimunisasi', $data);
    }

    public function profile()
    {
        $data = ['title' => "Profile"];
        return view('kader/profile', $data);
    }

    public function edit_profile()
    {
        $data = ['title' => "Edit Profile"];
        return view('kader/editprofile', $data);
    }

    public function addcatatan(){
       $data = array(
           'id_anak' => $this->request->getVar('id_anak'),
           'nama_anak' => $this->request->getVar('nama'),
           'tanggal_imunisasi' => $this->request->getVar('tanggal_imunisasi'),
           'nama_imunisasi' => $this->request->getVar('nama_imunisasi'),
           'berat' => $this->request->getVar('berat'),
           'tinggi' => $this->request->getVar('tinggi'),
           'lingkarbadan' => $this->request->getVar('lingkarbadan'),
           'lingkarkepala' => $this->request->getVar('lingkarkepala'),
           'no_kk' => $this->request->getVar('no_kk'),
           'catatan' => $this->request->getVar('catatan')
       );
       $this->PemeriksaanImunisasiModel->save($data);
       session()->setFlashdata('tambah', 'berhasil update pemeriksaan');
       return redirect()->to(base_url('/kader/jadwalimunisasi'));
    }

    public function addanak(){
        $oridate = $this->request->getVar('date');
        $newdate = date('y-m-d', strtotime($oridate));
        $data = array(
            'nama_anak' => $this->request->getVar('nama'),
            'tanggal_lahir' => $newdate,
            'umur' => $this->request->getVar('umur'),
            'no_kk' => $this->request->getVar('no_kk')
        );
        $this->anakModel->save($data);
        session()->setFlashdata('tambah', 'berhasil tambah data anak');

        return redirect()->to(base_url('/kader/datakeluarga'));
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
        return redirect()->to(base_url('kader/edit_Profile'));
    }

    //--------------------------------------------------------------------

}
