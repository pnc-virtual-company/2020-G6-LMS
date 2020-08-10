<?php namespace App\Validation;
use App\Models\UserModel;
class Rule{
    public function validateUser( string $str, string $fields,array $data)
    {
        $model = new UserModel();
        $user = $model->where('email', $data['email']) ->first();
        if(empty($user))
            return false;
        return password_verify($data['password'],$user['password']);
    }
}