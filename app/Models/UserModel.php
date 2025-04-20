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
        'USER_ROLE_ID',
        'USER_IS_ACTIVE'
    ];

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
        if (isset($data['USER_PASSWORD'])) {
            $data['USER_PASSWORD'] = $this->hashPassword($data['USER_PASSWORD']);
        }

        return $this->insert($data);
    }
}


?>