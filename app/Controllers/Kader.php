<?php

namespace App\Controllers;

class Kader extends BaseController
{
    public function index()
    {
        if (session()->get('level') != 3) {
            session()->setFlashdata('warning', 'Anda Belum Login !');
            return redirect()->to(base_url('/'));
        }

        return view('kader/index');
    }

    //--------------------------------------------------------------------

}
