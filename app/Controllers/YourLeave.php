<?php namespace App\Controllers;

class YourLeave extends BaseController
{

	
	public function showYourLeave()
	{
		$data = [];
		if(!session()->get('isLoggedIn')){
			redirect()->to('/');
		}
		return view('yourLeaves');
	}
	//--------------------------------------------------------------------

}
