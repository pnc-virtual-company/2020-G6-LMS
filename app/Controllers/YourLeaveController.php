<?php namespace App\Controllers;
use App\Models\YourLeaveModel;
use App\Models\UserModel;
class YourLeaveController extends BaseController
{
	
	protected $yourLeaveRequest;
	protected $user;

    public function __construct() 
        {
		$this->yourLeaveRequest = new YourLeaveModel();
		$this->user = new UserModel();
		}
		
		// The function to show all your leave requests created.
			public function showYourLeaveRequests()
		{
			$getData = [
				'yourLeaveData' =>$this->yourLeaveRequest->getAllLeaveRequest(),
				'userData' => $this->user->getUserInfo(),
				"viewUserInfo" => $this->user->viewUserInfo(),
			];
			if(!session()->get('isLoggedIn')){
				redirect()->to(base_url('/'));
			}
			return view('yourLeaves', $getData);
		}

	// The function create to add or create new employee's leave request.
		public function createYourLeaveRequest()
	{
		$data = [];
		helper(['form']);
		if($this->request->getMethod() == "post"){

			// set rulse of input filed when employee create leave request.
			// All the filed input must be input information.
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
				$user_id = $this->request->getVar('user_id');

				$newData = array(
					
					'start_date'=>$startDate,
					'time_start'=>$timeStart,
					'end_date'=>$endDate,
					'time_end'=>$timeEnd,
					'duration'=>$duration,
					'leave_type'=>$leaveType,
					'comment'=>$comment,
					'user_id'=>$user_id,
				);
				$this->yourLeaveRequest->insert($newData);
				$data['validation'] = $this->validator;
				$EmployeeName = strstr(session()->get('email'),'@',true);
				$employeeEmail = (session()->get('email'));
				$sessionSuccess = session();
				$sessionSuccess->setFlashdata('success', 'Your leave request created');

				$managerEmail = 'sim.doem@student.passerellesnumeriques.org';
				$managerName = 'sim doem';
				$hrUser = 'boeb.roth@gmail.com';
				$subject = "Leave Request";
				$message =  "
					<fieldset style='border:1px dotted teal;'>
						<div style='border-style: solid; width:80%;' id='emails'>
						<div class='container' style='width:90%; margin:0 outo; margin-top: 10px; display:flex;'>
						<div class='col-6' style='width:46%; margin-left:30px;'>
						<p>From: $employeeEmail </p>
						<p>To: $managerEmail </p>
						<p>Subject: $subject</p>
						</div>
						<div class='col-6' style='width:46%; margin-left:30px;'>
						<a href=''><img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTs61yAjqutCtaLuEtugjwIyy_G7LRd35_OrA&usqp=CAU' style='width:50px; margin-left: 260px;' alt=''></a>
						</div>
						</div>
						<hr>

						<div class='infomation'>
						<p style='margin-left:20px;'> Hello you $managerName,</p>
						<p style='margin-left:20px;'>Employee $EmployeeName has submited the following request for approval:</p>
						<div class='card p-3 bg-light ml-5' style='width: 700px'>
						<div class='row-body' style='width:80%; margin:0 auto; border: 2px solid rgb(43, 42, 42); background-color: rgb(201, 198, 198); display: flex;'>

						<div class='col1-6' style='width:40%; padding:10px; margin-left:30px;'>
						<p><strong>Start date </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $startDate</p>
						<p><strong>Emd date </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $endDate</p>
						<p><strong>Duration </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $duration</p>
						<p><strong>Leave type </strong> &nbsp;&nbsp;&nbsp;&nbsp; $duration</p>
						</div>

						<div class='col2-6' style=' width:40%; padding:10px; margin-left:30px;'>
						<p><strong>Comment </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $comment</p> 
						<p><strong>Employee </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $EmployeeName</p>
						<p><strong>Staus </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Request</p>
						</div>
						</div>
						</div>
						</div>

						<p style='margin-left: 20px;'>Can you please <a href='/sendback' onclick='myFunction()'>ACCEPT</a> OR <a href='/sendback' onclick='myFunction()'>REJECT</a>
						this leave request you can also access to <a href='http://localhost:8080'>leave request details </a>to review this request</p>
						<p style='margin-left: 20px;'>Thank & regard,</p>
						<p style='margin-left: 20px;'>$managerName</p>
						</div>
						</div>
					</fieldset>";

				$email = \Config\Services::email();
				$email->setfrom($employeeEmail, $EmployeeName);
				$email->setTo($managerEmail); // send to employee's manager.
				$email->setCC($hrUser);//the employee CC to employee's hr.
				$email->setSubject($subject); // set the purpose of leave request.
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
	// Delete employee's leave request.
	public function deleteYourLeave($id){
		$yourLeaveRequest = new YourLeaveModel();
		$yourLeaveRequest->delete($id);
		return redirect()->to(base_url('/yourLeave'));
	}
}
