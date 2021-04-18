<?php
// Not used
namespace App\Controllers;

class Landing extends BaseController
{

	public function index()
	{
		$data = ['title' => "Landing page"];
		return view('landing/index',$data);
	}
}
