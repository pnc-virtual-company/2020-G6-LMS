<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'u_id';

    protected $returnType     = 'array';

    protected $allowedFields = ['firstName', 'lastName','startDate', 'profile', 'email', 'password', 'role', 'position_id', 'department_id'];

    public function getUserInfo() 
    {
        return $this->db->table('user')
        ->join('position', 'user.position_id = position.p_id')
        ->join('department', 'department.d_id = user.department_id')
        ->get()->getResultArray();
    }
}