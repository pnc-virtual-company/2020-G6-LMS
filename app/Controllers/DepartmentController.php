<?php namespace App\Controllers;
use App\Models\DepartmentModel;
use App\Models\UserModel;
class DepartmentController extends BaseController
{

    protected $department;
    protected $user;
    
	public function __construct() 
    {
        $this->department = new DepartmentModel();
        $this->user = new UserModel();
    }
    
    //--------------------------------------------------------------------
    // The function to show all employee's department created.

	public function showDepartment()
	{
		$departmentData = [
            'departmentData' => $this->department->getAllDepartment(),
            "viewUserInfo" => $this->user->viewUserInfo(),
        ];
		return view('department', $departmentData);
	}

	//--------------------------------------------------------------------
     // The function create to add or create new employee's department.
	public function addDepartment()
    {
        $data = [];
        if($this->request->getMethod() == "post"){
            helper(['form']);

            // set rulse of input filed when employee create new department.
			// All the filed input must be input information.
			// The information must be differen.
            $rules = [
                'dname'=> [
                    'rules'=> 'required|is_unique[department.dname]',
                    'errors'=> [
                        'required'=> 'The create department name field is required.',
                        'is_unique' => 'The create department name already exists.',
                    ]
                ],
            ];

            if($this->validate($rules)){
                $department = $this->request->getVar('dname');
                $data = array(      
                    'dname' => $department
                );
                $this->department->insert($data);
                $sessionSuccess = session();
                $sessionSuccess->setFlashdata('success', 'Successful create department');
                return redirect()->to(base_url("/department"));
            }else{
                $data['validation'] = $this->validator;
                $sessionError = session();
                $validation = $this->validator;
                $sessionError->setFlashdata('error', $validation);
                return redirect()->to(base_url("/department"));
            }
        }
    }

    //--------------------------------------------------------------------
    // Delete employee's department that created.
	public function deleteDepartment($id)
    {
        $department = new DepartmentModel();
        $department->delete($id);
        return redirect()->to(base_url("/department"));
    }

	//--------------------------------------------------------------------
	// monify employee's department that created.
	public function updateDepartment()
    {
        $data = [];
        helper(['form']);
        if($this->request->getMethod() =='post') {
            $rules = [
                'dname' => [
                    'rules' => 'required|is_unique[department.dname]',
                    'errors'=>[
                        'required'=> 'The update department name field is required.',
                        'is_unique' => 'The update department name already exists.',
                    ] 
                ],
            ];
            if($this->validate($rules)) {

                $departmentId = $this->request->getVar('department_id');
                $department = $this->request->getVar('dname');
                $data = array(
                    'dname' => $department
                );
                $this->department->update($departmentId, $data);
                $data['validation'] = $this->validator;
                $sessionSuccess = session();
                $sessionSuccess->setFlashdata('success', 'Successful update department');
                return redirect()->to(base_url("/department"));
            }else{
                $data['validation'] = $this->validator;
                $sessionErrror = session();
                $validation = $this->validator;
                $sessionErrror->setFlashdata('error', $validation);
                return redirect()->to(base_url("/department")); 
            }
        }
    }
}