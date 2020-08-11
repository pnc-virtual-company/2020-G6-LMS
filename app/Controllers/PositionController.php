<?php namespace App\Controllers;
use App\Models\PositionModel;
class PositionController extends BaseController
{
	protected $position;

    public function __construct() 
        {
        $this->position = new PositionModel();
        }
        
    //--------------------------------------------------------------------
    // The function to show all employee's position created.
        public function showPosition()
        {
            $data = [
                'positionData' => $this->position->getAllPosition(),
            ];
            return view('position', $data); 
    }


	//--------------------------------------------------------------------
   // The function create to add or create new employee's position.
	public function addPosition() 
    {
        
        helper(['form']);
        $data = [];
        if($this->request->getMethod()== "post") {
            $rules = [
                'pname'=> [
                    'rules' => 'required|is_unique[position.pname]',
                    'errors'=>[
                        'required'=> 'The position name field is required.',
                        'is_unique' => 'The position already exists.',
                    ]  
                ],
                
            ];
            if($this->validate($rules)) {
                $position = $this->request->getVar('pname');
                $data = array(
                    'pname' => $position
                );
            
                $this->position->insert($data);
                $data['validation'] = $this->validator;
                $sessionSuccess = session();
                $sessionSuccess->setFlashdata('success', 'Successful create position');
                return redirect()->to(base_url("/position"));
            }else{
                $data['validation'] = $this->validator;
                $sessionErrror = session();
                $validation = $this->validator;
                $sessionErrror->setFlashdata('error', $validation);
                
                return redirect()->to(base_url("/position"));
            }
        }
    }
    

    //--------------------------------------------------------------------
    // Delete employee's position that created.

   public function deletePosition($id)
   {
       $position = new PositionModel();
       $position->delete($id);
       return redirect()->to(base_url("/position"));

   } 

    // monify employee's position that created.
    public function updatePosition()
    {
        $data = [];
        helper(['form']);
        if($this->request->getMethod() =='post') {
            $rules = [
                'pname' => [
                    'rules' => 'required|is_unique[position.pname]',
                    'errors'=>[
                        'required'=> 'The position name field is required.',
                        'is_unique' => 'The position already exists.',
                    ] 
                ],
            ];
            if($this->validate($rules)) {

                $positionId = $this->request->getVar('position_id');
                $position = $this->request->getVar('pname');
                $data = array(
                    'pname' => $position
                );
                $this->position->update($positionId, $data);
                $data['validation'] = $this->validator;
                $sessionSuccess = session();
                $sessionSuccess->setFlashdata('success', 'Successful update position');
                return redirect()->to(base_url("/position"));
            }else{
                $data['validation'] = $this->validator;
                $sessionErrror = session();
                $validation = $this->validator;
                $sessionErrror->setFlashdata('error', $validation);
                return redirect()->to(base_url("/position")); 
            }
        }
    }
}