<?php namespace App\Controllers;
use App\Models\DepartmentModel;
class DepartmentController extends BaseController
{

	protected $department;
	public function __construct() 
    {
        $this->department = new DepartmentModel();
    }
    
    //--------------------------------------------------------------------

	public function showDepartment()
	{
		$data = [
            'departmentData' => $this->department->getAllDepartment(),
        ];
		return view('department', $data);
	}

	//--------------------------------------------------------------------

	public function addDepartment()
    {
        $data = [];
        if($this->request->getMethod() == "post"){
            helper(['form']);
            $rules = [
                'dname'=> [
                    'rules'=> 'required|is_unique[department.dname]',
                    'errors'=> [
                        'required'=> 'The department name field is required.',
                        'is_unique' => 'This is department name already exists.',
                    ]
                ],
            ];

            if($this->validate($rules)){
                $department = $this->request->getVar('dname');
                $data = array(      
                    'dname' => $department
                );
                $this->department->insert($data);
                return redirect()->to('/department');
            }else{
                $data['validation'] = $this->validator;
                $sessionError = session();
                $validation = $this->validator;
                $sessionError->setFlashdata('error', $validation);
                return redirect()->to('/department');
            }
        }
    }

    //--------------------------------------------------------------------

	public function deleteDepartment($id)
    {
        $department = new DepartmentModel();
        $department->delete($id);
        return redirect()->to('/department');
    }

	//--------------------------------------------------------------------
	
	public function updateDepartment()
    {
        $data = [];
        if($this->request->getMethod() == "post"){
            helper(['form']);
            $rules = [
                'dname'=> [
                    'rules'=> 'required|is_unique[department.dname]',
                    'errors'=> [
                        'required'=> 'The department name field is required.',
                        'is_unique' => 'This is department name already exists.',
                    ]
                ],
            ];
        }
        if($this->validate($rules)){

            $departmentId = $this->request->getVar('department_id');
            $department = $this->request->getVar('dname');
            $data = array(
                'dname' => $department
            );
            $this->department->update($departmentId, $data);
            return redirect()->to('/department');

        }else{
            $data['validation'] = $this->validator;
            $sessionError = session();
            $validation = $this->validator;
            $sessionError->setFlashdata('error', $validation);
            return redirect()->to('/department');
        }
    }
}