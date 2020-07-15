<?php namespace App\Controllers;

class User extends BaseController
{
	public function index()
	{
		return view('login');
	}
	public function profile()
	{
		return view('profile');
	}
	public function logout(){
		$session()->destroy();
		return redirect()->to('/');
	}
	//--------------------------------------------------------------------
}