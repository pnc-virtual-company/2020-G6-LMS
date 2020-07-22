<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['firstName','lastName','startDate','profile','email','password','role'];

    // 'password' => password_hash($userInfo['password'], PASSWORD_DEFAULT), 

}