<?php namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController{
	
	public function viewmployee()
	{
		return view('employeeView');
	}

	public function setUserSession($user){
		$data = [
			'u_id' => $user['u_id'],
			'firstName' => $user['firstName'],
			'lastName' => $user['lastName'],
			'startDate' => $user['startDate'],
			'email' => $user['email'],
			'password' => $user['password'],
			'role' => $user['role'],
			'isLoggedIn'=> true,
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
				'email' =>[ 
					'rules'=>'required|valid_email',
					'label' =>'Email address',
					'errors'=>[
						'required'=>'Email address is a required filed',
						'valid_email' => 'Email address invalid'
						]
                ],
                'password' =>[ 
					'rules'=>'required|validateUser[email,password]',
					'label' =>'Password',
					'errors'=>[
                        'required'=>'Password is a required filed',
                        'validateUser'=>'password or email incorrect please try again'
						]
				],
			];
			//messages when user put the email and password incorrect
			$error = [
				'password' => [
					'validateUser' => 'password and email incorrect please try again'
				]
			];
			if(isset($_POST['submit'])){
				if($this->validate($rules,$error)){
					$userModel = new UserModel();
					$user = $userModel->where('email',$this->request->getVar('email')) ->first();
					$this->setUserSession($user);
					return redirect()->to('/yourLeave');
				}else{
					$data['validation'] = $this->validator;
				}
			}
		}
		return view('login',$data);
	}
	public function profile()
	{
		return view('profile');
	}
	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}
	//--------------------------------------------------------------------
}