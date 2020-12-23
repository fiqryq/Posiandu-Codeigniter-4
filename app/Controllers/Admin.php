<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }


    public function index()
    {
        $user = $this->userModel->findAll();
        $data = [
            'title' => "admin",
            'user' => $user
        ];
        return view('admin/index', $data);
    }

    public function addkader()
    {
        $data = ['title' => "tambah kader"];
        return view('admin/addkader', $data);
    }

    public function addbidan()
    {
        $data = ['title' => "tambah bidan"];
        return view('admin/addbidan', $data);
    }

    public function profile()
    {
        $data = ['title' => "Profile"];
        return view('admin/profile', $data);
    }

    public function edit_profile()
    {
        $data = ['title' => "Edit Profile"];
        return view('admin/editprofile', $data);
    }
}
    //--------------------------------------------------------------------
