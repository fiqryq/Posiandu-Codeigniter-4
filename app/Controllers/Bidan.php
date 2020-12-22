<?php

namespace App\Controllers;

class Bidan extends BaseController
{
    public function index()
    {
        $data = ['title' => "Penyuluhan"];
        return view('bidan/index', $data);
    }

    public function artikel()
    {
        $data = ['title' => "Artikel"];
        return view('bidan/artikel', $data);
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