<?php namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'u_id';

    protected $returnType     = 'array';

    protected $allowedFields = ['firstName', 'lastName','startDate', 'profile', 'email', 'password', 'role','manager', 'position_id', 'department_id'];

    public function getUserInfo()
    {
        return $this->db->table('user')
        ->join('position', 'user.position_id = position.p_id')
        ->join('department', 'department.d_id = user.department_id')
        ->get()->getResultArray();
    }
    
    public function registerUser($userInfo){
        $this->insert([
        'firstName'=>$userInfo['firstName'],
        'lastName'=>$userInfo['lastName'],
        'startDate'=>$userInfo['startDate'],
        'email'=>$userInfo['email'],
        'password'=>password_hash($userInfo['password'],PASSWORD_DEFAULT),
        'role'=>$userInfo['role'],
        'manager'=>$userInfo['manager'],
        'position_id'=>$userInfo['position_id'],
        'department_id'=>$userInfo['department_id'],
        ]);
        }
        public function viewUserInfo(){
            $userId = session()->get('u_id');
            return $this->db->table('user')
            ->join('position', 'user.position_id = position.p_id')
            ->join('department', 'department.d_id = user.department_id')
            ->where('u_id = "'.$userId.'"')
            ->get()->getResultArray();
            }
}