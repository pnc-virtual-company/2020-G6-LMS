<?php namespace App\Controllers;
use App\Models\DepartmentModel;
class DepartmentController extends BaseController
{
	protected $department;
	public function __construct() 
    {
        $this->department = new DepartmentModel();
    }
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
        $department = $this->request->getVar('dname');
        $data = array(
            'dname' => $department
        );
        $this->department->insert($data);
        return redirect()->to("/department");
    }
}

