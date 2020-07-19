<?php namespace App\Controllers;
use App\Models\PositionModel;
class PositionController extends BaseController
{
	public function showPosition()
	{
		$model = new PositionModel();
		$data['positionEmpoyee'] = $model->findAll();
		return view('position', $data);
	}

	// create position of employee

	public function createPosition(){
		
		$data = [];
		helper(['form']);

		if($this->request->getMethod() == "post"){
			$rules = [
				'position_name'=>'required'
			];
				$model = new PositionModel();
				$newData = [
				'position_name' => $this->request->getVar('position_name')
			];
			
			$model->insertPosition($newData);
			return redirect()->to('/position');
		}

		return view('position', $data); 	
	}

	//--------------------------------------------------------------------

}
