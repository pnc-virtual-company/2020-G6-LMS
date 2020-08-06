<?php namespace App\Models;
use CodeIgniter\Model;

class YourLeaveModel extends Model
{
    protected $table      = 'leave_request';
    protected $primaryKey = 'leave_id';

    protected $returnType     = 'array';

    protected $allowedFields = ['start_date', 'time_start', 'end_date', 'time_end', 'duration', 'leave_type','comment', 'user_id'];

    public function getAllLeaveRequest() 
    {
        return $this->db->table('leave_request')->get()->getResultArray();
    }

 
}