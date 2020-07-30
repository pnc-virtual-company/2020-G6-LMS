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
                return redirect()->to("/department");
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
                        'required'=> 'The update department name field is required.',
                        'is_unique' => 'The update department name already exists.',
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
            $sessionSuccess = session();
            $sessionSuccess->setFlashdata('success', 'Successful update department');
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