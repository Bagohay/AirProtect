<?php

namespace App\Models;

use App\Models\BaseModel;
use Config\Database;

class UserModel extends BaseModel{
    protected $table = 'USER_ACCOUNT';

    protected $primaryKey= 'USER_ID';

    protected $fillable = [
        'USER_PROFILE_URL',
        'USER_FIRST_NAME',
        'USER_LAST_NAME',
        'USER_EMAIL',
        'USER_HASHED_PASSWORD',
        'USER_PHONE_NUMBER',
        'USER_ROLE_ID',
        'USER_IS_ACTIVE',   
        'USER_REMEMBER_TOKEN',
        'USER_REMEMBER_TOKEN_EXPIRES_AT',
        'USER_LAST_LOGIN'
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
        if (isset($data['USER_HASHED_PASSWORD'])) {
            $data['USER_HASHED_PASSWORD'] = $this->hashPassword($data['USER_HASHED_PASSWORD']);
        }
    
        return $this->insert($data);
    }
    
    public function findByEmail($email)
    {
    return $this->select('USER_ACCOUNT.*, USER_ROLE.ROLE_NAME')
                ->join('USER_ROLE', 'USER_ACCOUNT.USER_ROLE_ID', 'USER_ROLE.ROLE_ID')
                ->where('USER_ACCOUNT.USER_EMAIL = :email')
                ->bind(['email' => $email])
                ->first();
    }

    public function verifyPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }


    public function updateLastLogin($userId)
    {
        return $this->update(
            [
                'USER_LAST_LOGIN' => date('Y-m-d H:i:s')
            ],
            "{$this->primaryKey} = :USER_ID",
            ['USER_ID' => $userId]
        );
    }
    
    public function generateRememberToken($userId, $days = 30)
    {
        $token = bin2hex(random_bytes(32));
        $expiresAt = date('Y-m-d H:i:s', strtotime("+$days days"));

        $this->update(
            [
                'USER_REMEMBER_TOKEN' => $token,
                'USER_REMEMBER_TOKEN_EXPIRES_AT' => $expiresAt
            ],
            "{$this->primaryKey} = :USER_ID",
            ['USER_ID' => $userId]
        );

        return $token;
    }



}




?>