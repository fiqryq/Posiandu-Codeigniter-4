<?php
// Not used
namespace App\Controllers;

class Home extends BaseController
{

	public function index()
	{
		$data = ['title' => "Login"];
		
        // Membatasi route sesuai role
        if (session() != null) {
            if (session()->get('level') == 4) {
                return redirect()->to(base_url('/user'));
            } elseif (session()->get('level') == 1) {
                return redirect()->to(base_url('/admin'));
            } elseif (session()->get('level') == 2) {
                return redirect()->to(base_url('/bidan'));
            } elseif (session()->get('level') == 3) {
                return redirect()->to(base_url('/kader'));
            }
        } else {
            // jika kondisi tidak terpenuhi maka akan redurect ke login view
            return redirect()->to(base_url('/home/index'));
        }

		return view('auth/login',$data);
	}

	public function register()
	{
		return view('auth/register');
	}

	//--------------------------------------------------------------------

}
