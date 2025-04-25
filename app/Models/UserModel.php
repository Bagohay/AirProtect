<?php

namespace App\Models;

use App\Models\BaseModel;
use Config\Database;

class UserModel extends BaseModel{
    protected $table = 'USERS';

    protected $fillable = [
        'USER_PROFILE_URL',
        'USER_FIRST_NAME',
        'USER_MIDDLE_NAME',
        'USER_LAST_NAME',
        'USER_EMAIL',
        'USER_PASSWORD',
        'ROLE_ID',
        'USER_IS_ACTIVE',   
        'USER_REMEMBER_TOKEN',
        'USER_LAST_LOGIN',
        'USER_REMEMBER_TOKEN_EXPIRES_AT',
        'USER_PHONE_NUMBER'
    ];

    protected $timestamps = true;
    protected $useSoftDeletes = true;

    public function emailExists($email)
    {
        return $this->exist('USER_EMAIL = :email', ['email' => $email]);
    }

    public function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function createUser(array $data)
    {
        if (isset($data['user_password'])) {
            $data['user_password'] = $this->hashPassword($data['user_password']);
        }

        return $this->insert($data);
    }
    
    //LOGIN PART
    public function findByEmail($email){
            return $this->select('USERS.*, ROLES.NAMES AS ROLE_NAME')
                        ->join('ROLES', 'USERS.ROLE_ID','ROLES.ROLE_ID')
                        ->where('USERS.USER_EMAIL = :EMAIL')
                        ->bind(['EMAIL' => $email])
                        ->first();
    }

    public function verifyPassword($password,$hash){

        return password_verify($password,$hash);

    }  
    //UPDATELASTLOGIN
    public function updateLastLogin($userId){
        return $this->update(
            [
                'USER_LAST_LOGIN' => date('Y-m-d H:i:s')
            ],
            "{$this->primaryKey} = :USER_ID",
            ['USER_ID' =>$userId]
            
        );

    }
    //REMEMBER_TOKEN

    public function generateRememberToken($userId, $days = 30)
    {
        $token = bin2hex(random_bytes(32));
        $expiresAt = date('Y-m-d H:i:s', strtotime("+$days days"));

        $this->update(
            [
                'user_remember_token' => $token,
                'user_remember_token_expires_at' => $expiresAt
            ],
            "{$this->primaryKey} = :id",
            ['id' => $userId]
        );

        return $token;
    }








    
}




?>