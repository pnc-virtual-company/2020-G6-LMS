<?php namespace App\Controllers;
use App\Models\PositionModel;
class Positions extends BaseController
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
				'name'=>'required'
			];
			if(!$this->validate($rules)){
				$data['validate'] = $this->validator;
				$model = new PositionModel();
			}else{
				$model = new PositionModel();
				$newData = [
				'name' => $this->request->getVar('name')
			];
			}	
			$model->insertPosition($newData);
			return redirect()->to('/position');
		}

		return view('position', $data); 	
	}

	//--------------------------------------------------------------------

}
