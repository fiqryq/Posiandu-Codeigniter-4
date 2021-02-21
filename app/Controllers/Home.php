<?php
// Not used
namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = ['title' => "Login"];
		return view('auth/login',$data);
	}

	public function register()
	{
		return view('auth/register');
	}

	//--------------------------------------------------------------------

}
