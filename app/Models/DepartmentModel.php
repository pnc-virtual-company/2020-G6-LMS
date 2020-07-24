<?php namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table      = 'department';
    protected $primaryKey = 'd_id';
    protected $returnType     = 'array';
    protected $allowedFields = ['dname'];

    public function getAllDepartment() 
    {
        return $this->db->table('department')->get()->getResultArray();
    }
}