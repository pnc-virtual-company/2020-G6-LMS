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
				'email' => 'required|valid_email',
				'password' => 'required|validateUser[email,password]'
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
            $this->user->insert($data);
        } else { 
            // message error here with session 
        }
        return redirect()->to("/employee");
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
        $userId = $this->request->getVar('user_id');
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
            $this->user->update($userId, $data);
        } else { 
            // message error here with session 
        }
        return redirect()->to("/employee");
    }

}