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
        $data = ['title' => "Data Orangtua"];

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

    //--------------------------------------------------------------------

}
