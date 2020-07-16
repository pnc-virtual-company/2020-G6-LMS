<?php namespace App\Controllers;
use App\Models\UserModel;
class User extends BaseController
{
	public function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'firstName' => $user['firstName'],
			'lastName' => $user['lastName'],
			'startDate' => $user['startDate'],
			'email' => $user['email'],
			'password' => $user['password'],
			'role' => $user['role']
		];
		session()->set($data);
		return true;
	}
	public function index()
	{
		helper(['form']);
		$data = [];
		if($this->request->getMethod() == "post"){
			// rule of user
			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required|UserValidation[email,password]'
			];
			//messages when user put the email and password incorrect
			$error = [
				'password' => [
					'UserValidation' => 'password and email incorrect please try again'
				]
			];
			if($this->validate($rules,$error)){
				$userModel = new UserModel();
				$user = $userModel->where('email',$this->request->getVar('email')) ->first();
				$this->setUserSession($user);
				return redirect()->to('/yourLeave');
			}else{
				$data['validation'] = $this->validator;
			}
		}
		return view('login',$data);
	}
	public function profile()
	{
		return view('profile');
	}
	//--------------------------------------------------------------------
}