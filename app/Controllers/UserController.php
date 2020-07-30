<?php namespace App\Controllers;
use App\Models\UserModel;
use App\Models\DepartmentModel;
use App\Models\PositionModel;
class UserController extends BaseController
{
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

			if(isset($_POST['submit'])){
				if($this->validate($rules)){
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
    //--------------------------------------------------------------------
	protected $user;
    protected $position;
    protected $department;

    public function __construct() 
    {
        $this->user = new UserModel();
        $this->department = new DepartmentModel();
        $this->position = new PositionModel();
    }
    
	public function showUser()
	{
        $data = [
            'userData' => $this->user->getUserInfo(),
            "positionData" => $this->position->getAllPosition(),
            "departmentData" => $this->department->getAllDepartment(),
            
        ];
		return view('employeeView', $data);
    }
    
    //--------------------------------------------------------------------

	public function createUser() 
    {
        helper(['form']);
        $data = [];
        if($this->request->getMethod() == "post"){
            $rules = [
                'firstName' => [
                    'rules' => 'required',
                    'errors'=>[
                        'required'=> 'The firstname name field is required.',
                    ] 
                ],
                'lastName' => [
                    'rules' => 'required',
                    'errors'=>[
                        'required'=> 'The lastName name field is required.',
                    ] 
                ],
                'email' => [
                    'rules' => 'required|is_unique[user.email]',
                    'errors'=>[
                        'required'=> 'The email name field is required.',
                        'is_unique' => 'The email already exists.',
                    ] 
                ],
                'password' => [
                    'rules' => 'required',
                    'errors'=>[
                        'required'=> 'The password name field is required.',
                    ] 
                ],
                'position' => [
                    'rules' => 'required',
                    'errors'=>[
                        'required'=> 'The position name field is required.',
                    ] 
                ],
                'department' => [
                    'rules' => 'required',
                    'errors'=>[
                        'required'=> 'The department name field is required.',
                    ] 
                ],
                'startDate' => [
                    'rules' => 'required',
                    'errors'=>[
                        'required'=> 'The startdate name field is required.',
                    ] 
                ],
            ];
            if($this->validate($rules)) {
                $firstName = $this->request->getVar('firstName');
                $lastName = $this->request->getVar('lastName');
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $position = $this->request->getVar('position');
                $department = $this->request->getVar('department');
                $startDate = $this->request->getVar('startDate');
                $data = array(
                    "firstName" => $firstName,
                    "lastName" => $lastName,
                    "email" => $email,
                    "password" => $password,
                    "position_id" => $position,
                    "department_id" => $department,
                    "startDate" => $startDate,
                );
                if ($position != "" and $department != "") {
                    $this->user->registerUser($data);
                } else { 
                    // message error here with session 
                }
                
                
                
                $data['validation'] = $this->validator;
                $sessionSuccess = session();
                $sessionSuccess->setFlashdata('success', 'Successful create employee');
                return redirect()->to("/employee");
            }else{
                 $data['validation'] = $this->validator;
                $sessionErrror = session();
                $validation = $this->validator;
                $sessionErrror->setFlashdata('error', $validation);
                
                return redirect()->to('/employee');
            }
        }
       
        
    }

    //--------------------------------------------------------------------

    public function deleteEmployee($id){
        $employee = new UserModel();
        $employee->delete($id);
        return redirect()->to('/employee');
    }

    //--------------------------------------------------------------------
    public function updateUser() 
    {
        helper(['form']);
        $data = [];
        if($this->request->getMethod() == "post"){
            $rules = [
                'firstName' => [
                    'rules' => 'required',
                    'errors'=>[
                        'required'=> 'The firstname name field is required.',
                    ] 
                ],
                'lastName' => [
                    'rules' => 'required',
                    'errors'=>[
                        'required'=> 'The lastName name field is required.',
                    ] 
                ],
                'email' => [
                    'rules' => 'required|is_unique[user.email]',
                    'errors'=>[
                        'required'=> 'The email name field is required.',
                        'is_unique' => 'The email already exists.',
                    ] 
                ],
                'password' => [
                    'rules' => 'required',
                    'errors'=>[
                        'required'=> 'The password name field is required.',
                    ] 
                ],
                'position' => [
                    'rules' => 'required',
                    'errors'=>[
                        'required'=> 'The position name field is required.',
                    ] 
                ],
                'department' => [
                    'rules' => 'required',
                    'errors'=>[
                        'required'=> 'The department name field is required.',
                    ] 
                ],
                'startDate' => [
                    'rules' => 'required',
                    'errors'=>[
                        'required'=> 'The startdate name field is required.',
                    ] 
                ],
            ];
            if($this->validate($rules)) {
                $firstName = $this->request->getVar('firstName');
                $lastName = $this->request->getVar('lastName');
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $position = $this->request->getVar('position');
                $department = $this->request->getVar('department');
                $startDate = $this->request->getVar('startDate');
                $data = array(
                    "firstName" => $firstName,
                    "lastName" => $lastName,
                    "email" => $email,
                    "password" => $password,
                    "position_id" => $position,
                    "department_id" => $department,
                    "startDate" => $startDate,
                );
                if ($position != "" and $department != "") {
                    $this->user->update($data);
                } else { 
                    // message error here with session 
                }
                
                
                
                $data['validation'] = $this->validator;
                $sessionSuccess = session();
                $sessionSuccess->setFlashdata('success', 'Successful update employee');
                 return redirect()->to("/employee");
            }else{
                 $data['validation'] = $this->validator;
                $sessionErrror = session();
                $validation = $this->validator;
                $sessionErrror->setFlashdata('error', $validation);
                
                return redirect()->to('/employee');
            }
        }
       
        
    }

}