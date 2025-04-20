<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Core\AvatarGenerator;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = $this->loadModel('UserModel');
    }

    public function login_register()
    {
        $this->render('auth/login_register');
    }

    public function Register()
    {
        $avatar = new AvatarGenerator();

        if (!$this->isPost() || !$this->isAjax()) {
            return $this->jsonError('Invalid request method');
        }

        $data = $this->getJsonInput();

        $requiredFields = ["first_name", "last_name", "email", "password", "confirm_password"];

        foreach ($requiredFields as $field) {
            if (empty($data[$field] ?? '')) {
                return $this->jsonError('All fields are required');
            }
        }

        $profileUrl = $avatar->generate($data['first_name'] . ' ' . $data['last_name']);
        $firstname = $data['first_name'];
        $lastname = $data['last_name'];
        $middlename = $data['middle_name'] ?? null;
        $email = $data['email'];
        $password = $data['password'];
        $confirmPassword = $data['confirm_password'];


        

        if ($password !== $confirmPassword) {
            return $this->jsonError('Passwords do not match');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->jsonError("Invalid email format");
        }

        if ($this->userModel->emailExists($email)) {
            return $this->jsonError("Email already exists");
        }

        $result = $this->userModel->createUser([
            'USER_PROFILE_URL' => $profileUrl,
            'USER_FIRST_NAME' => $firstname,
            'USER_MIDDLE_NAME' => $middlename,
            'USER_LAST_NAME' => $lastname,
            'USER_EMAIL' => $email,
            'USER_PASSWORD' => password_hash($password, PASSWORD_DEFAULT), // optional but recommended
            'USER_ROLE_ID' => 1,
            'USER_IS_ACTIVE' => true
        ]);
        

        if (!$result) {
            return $this->jsonError('Failed to register user. Please try again.');
        }

        return $this->jsonSuccess('User registered successfully!');
    }
}





?>