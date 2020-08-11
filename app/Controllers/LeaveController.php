<?php namespace App\Controllers;

use App\Models\YourLeaveModel;
use App\Models\userModel;

class LeaveController extends BaseController
{
	protected $leave;
	protected $user;

	public function __construct()
	{
		$this->leave = new YourLeaveModel();
		$this->user = new userModel();
	}
	public function showLeaveView()
	{
		$data = [
			'LeaveDate' => $this->leave->getAllLeaveRequest(),
			'userDate' => $this->user->getUserInfo(),
			"viewUserInfo" => $this->user->viewUserInfo(),
		];
		return view('leave', $data);
	}

	public function sendEmailAccept()
	{
		$managerEmail = 'boeb.roth@gmail.com';
		$employeeName = strstr(session()->get('email'),'@',true);
		$employeeEmail = (session()->get('email'));
		$subject = "Leave Request";
		$message = '<fieldset style = "border:1px;dotted teal;"> Dear Rady,<br><br>
					Thank you for your information.<br><br>
					<a href = "'.base_url().'/email/verify"
					style = "padding:5px 20px 5px 20px;background:orage; color:blue;text-decoration:none;border-radius:40px">Confirm</a> 
					<br><br>
					Best Regqrds,<br><br>
					CodeIgniter 4
					</fieldset>
			';
			$email = \Config\Services::email();
			$email->setTo($employeeEmail );
			$email->setFrom($managerEmail, $employeeName);
			$email->setSubject($subject);
			$email->setMessage($message);
			$email->send();
			return redirect()->to(base_url('/leave'));
	}
	public function verify()
	{
		return "Email account actived";
	}

}