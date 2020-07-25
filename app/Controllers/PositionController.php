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

	public function addPosition() 
    {
        $position = $this->request->getVar('pname');
        $data = array(
            'pname' => $position
        );
    
        $this->position->insert($data);
        return redirect()->to("/position");
    }

   public function deletePosition($id)
   {
       $position = new PositionModel();
       $position->delete($id);
       return redirect()->to('/position');

   } 

   public function updatePosition()
    {
        $positionId = $this->request->getVar('position_id');
        $position = $this->request->getVar('pname');
        $data = array(
            'pname' => $position
        );
        $this->position->update($positionId, $data);
        return redirect()->to('/position');
    }


}
