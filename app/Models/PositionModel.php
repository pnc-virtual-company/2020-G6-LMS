<?php namespace App\Models;

use CodeIgniter\Model;

class PositionModel extends Model
{
    protected $table      = 'position';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['name'];

    public function insertPosition($position) 
    {
        $this->insert([
            'name'=>$position['name'],
        ]);
    }
}