<?php namespace App\Controllers;
use App\Models\YourLeaveModel;
class YourLeave extends BaseController
{

	protected $yourLeave;

    public function __construct() 
        {
        $this->yourLeave = new YourLeaveModel();
        }
        
			public function showYourLeave()
		{
			$data = [
				'yourLeaveData' =>$this->yourLeave->getAllLeaveRequest(),
			];
			if(!session()->get('isLoggedIn')){
				redirect()->to(base_url('/'));
			}
			return view('yourLeaves', $data);
		}

		public function createYourLeave()
	{
		$data = [];
		helper(['form']);
		if($this->request->getMethod() == "post"){
			$rulse = [
				'start_date'=>'required',
				'time_start'=>'required',
				'end_date'=>'required',
				'time_end'=>'required',
				'duration'=>'required',
				'leave_type'=>'required'
			];
			if($this->validate($rulse)) {
				$startDate = $this->request->getVar('start_date');
				$timeStart = $this->request->getVar('time_start');
				$endDate = $this->request->getVar('end_date');
				$timeEnd = $this->request->getVar('time_end');
				$duration = $this->request->getVar('duration');
				$leaveType = $this->request->getVar('leave_type');
				$comment = $this->request->getVar('comment');

				$newData = array(
					'start_date'=>$startDate,
					'time_start'=>$timeStart,
					'end_date'=>$endDate,
					'time_end'=>$timeEnd,
					'duration'=>$duration,
					'leave_type'=>$leaveType,
					'comment'=>$comment,
				);
				$this->yourLeave->insert($newData);
				$data['validation'] = $this->validator;
				$sessionSuccess = session();
				$sessionSuccess->setFlashdata('success', 'Your leave request created');

				


				$to = 'sim.doem@student.passerellesnumeriques.org';
				$subject = "Leave Request";
				$message =  '
					<fieldset style="border:1px dotted teal;">
						<div style="border-style: solid; width:80%;" id="emails">
						<div class="container" style="width:90%; margin:0 outo; margin-top: 10px; display:flex;">
						<div class="col-6" style="width:46%; margin-left:30px;">
						<p>From: simdoem@gmail.com </p>
						<p>To: sim.doem@student.passerellesnumeriques.org </p>
						<p>Subject: New leave request assigned to you</p>
						</div>
						<div class="col-6" style="width:46%; margin-left:30px;">
						<a href=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTs61yAjqutCtaLuEtugjwIyy_G7LRd35_OrA&usqp=CAU" style="width:50px; margin-left: 260px;" alt=""></a>
						</div>
						</div>
						<hr>

						<div class="infomation">
						<p style="margin-left:20px;"> Hello Jack Thomas,</p>
						<p style="margin-left:20px;">Employee lina jacks has submited the following request for approval:</p>
						<div class="card p-3 bg-light ml-5" style="width: 700px">
						<div class="row-body" style="width:80%; margin:0 auto; border: 2px solid rgb(43, 42, 42); background-color: rgb(201, 198, 198); display: flex;">

						<div class="col1-6" style="width:40%; padding:10px; margin-left:30px;">
						<p><strong>Start date </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;startdate</p>
						<p><strong>Emd date </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;enddate</p>
						<p><strong>Duration </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;duration</p>
						<p><strong>Leave type </strong> &nbsp;&nbsp;&nbsp;&nbsp;type</p>
						</div>

						<div class="col2-6" style=" width:40%; padding:10px; margin-left:30px;">
						<p><strong>Comment </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;comment</p>
						<p><strong>Employee </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;firstName</p>
						<p><strong>Staus </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Request</p>
						</div>
						</div>
						</div>
						</div>

						<p style="margin-left: 20px;">Can you please <a href="/sendback" onclick="myFunction()">ACCEPT</a> OR <a href="/sendback" onclick="myFunction()">REJECT</a>
						this leave request you can also access to <a href="http://localhost:8080/">leave request details </a>to review this request</p>
						<p style="margin-left: 20px;">Thank & regard,</p>
						<p style="margin-left: 20px;">HR officer </p>
						</div>
						</div>
					</fieldset>';

				$email = \Config\Services::email();
				$email->setfrom('simdoem99@gmail.com', 'Sim');
				$email->setTo($to);
				$email->setSubject($subject);
				$email->setMessage( $message);

				if($email->send()){
				echo "Success sending";
				}else{
				echo "Cannot send";
				}

				return redirect()->to(base_url('/yourLeave'));
					
			}else{
				$data['validation'] = $this->validator;
				$sessionError = session();
				$validation = $this->validator;
				$sessionError->setFlashdata('error', $validation);
				return redirect()->to(base_url('/yourLeave'));
			}	
		}		
	}
	//--------------------------------------------------------------------
	
	// Delete your leave request
	public function deleteYourLeave($id){
		$yourLeave = new YourLeaveModel();
		$yourLeave->delete($id);
		return redirect()->to(base_url('/yourLeave'));
	}
}
