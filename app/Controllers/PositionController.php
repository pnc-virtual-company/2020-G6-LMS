<?php namespace App\Controllers;
use App\Models\PositionModel;
class PositionController extends BaseController
{
	protected $position;

    public function __construct() 
        {
        $this->position = new PositionModel();
        }
        
        public function showPosition()
        {
            $data = [
                'positionData' => $this->position->getAllPosition(),
            ];
            return view('position', $data);
            //echo "Hello";
    }
	//--------------------------------------------------------------------

    // Create or add more position of employee

    
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
                return redirect()->to("/position");
            }else{
                $data['validation'] = $this->validator;
                $sessionErrror = session();
                $validation = $this->validator;
                $sessionErrror->setFlashdata('error', $validation);
                
                return redirect()->to('/position');
            }
        }
    }
    

    // delete on position of employee

   public function deletePosition($id)
   {
       $position = new PositionModel();
       $position->delete($id);
       return redirect()->to('/position');

   } 

    // update old position to new to new position of employee

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
                return redirect()->to('/position');
            }else{
                $data['validation'] = $this->validator;
                $sessionErrror = session();
                $validation = $this->validator;
                $sessionErrror->setFlashdata('error', $validation);
                return redirect()->to('/position'); 
            }
        }
    }
}