<?php

namespace App\Controllers;

use DateTime;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Core\AvatarGenerator;
use Core\Cookie;
use Core\Session;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = $this->loadModel('UserModel');
    }

    public function RenderLogin()
    {
        $this->render('auth/login');
    }

    public function RenderRegister(){
        $this->render('auth/register');
    }

    public function Login(){
        if (!$this->isPost() || !$this->isAjax()) {
            return $this->jsonError('Invalid request method');
        }
    
        $data = $this->getJsonInput();
        
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';
        $remember = isset($data['remember']);
    
        // Get user record but check for soft deletion
        $user = $this->userModel->findByEmail($email);
    
        // Check if user exists
        if (!$user) {
            return $this->jsonError('Invalid email or password');
        }
        
        // Check if account is soft deleted
        if ($user['USER_DELETED_AT'] !== null) {
            return $this->jsonError('This account has been deactivated');
        }
        
        // Check password and active status
        if (!$this->userModel->verifyPassword($password, $user['USER_HASHED_PASSWORD'])) {
            return $this->jsonError('Invalid email or password');
        }
        
        if (!$user['USER_IS_ACTIVE']) {
            return $this->jsonError('Account is inactive');
        }
    
        // Update last login timestamp
        $this->userModel->updateLastLogin($user['USER_ID']);
    
        // Set session data
        $_SESSION['USER_ID'] = $user['USER_ID'];
        $_SESSION['USER_PROFILE_URL'] = $user['USER_PROFILE_URL'];
        $_SESSION['USER_FIRST_NAME'] = $user['USER_FIRST_NAME'];
        $_SESSION['USER_LAST_NAME'] = $user['USER_LAST_NAME'];
        $_SESSION['USER_FULL_NAME'] = $user['USER_FIRST_NAME'] . ' ' . $user['USER_LAST_NAME'];
        $_SESSION['USER_EMAIL'] = $user['USER_EMAIL'];
        $_SESSION['USER_PHONE_NUMBER'] = $user['USER_PHONE_NUMBER'];
        $_SESSION['USER_ROLE'] = $user['ROLE_NAME'] ?? "Customer";
    
        if ($remember) {
            $token = $this->userModel->generateRememberToken($user['USER_ID'], 30);
            Cookie::set('USER_REMEMBER_TOKEN', $token, 30);
        }
    
        $role = $user['ROLE_NAME'] ?? "/";
    
        $redirectUrl = match ($role) {
            'Customer'    => '/user/dashboard',
            'Technician'  => '/technician/dashboard',
            'Admin'       => '/admin/dashboard',
            default       => '/'
        };
    
        if ($role === "Admin") {
            Session::set("PROFILE_ROUTE", '/admin/admin-profile');
        } else if ($role === 'Technician'){
            Session::set("PROFILE_ROUTE", '/admin/admin-profile');
        } else {
            Session::set("PROFILE_ROUTE", '/user/user-profile');
        }
    
        return $this->jsonSuccess(
            ['redirect_url' => $redirectUrl],
            'Login successful'
        );
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
            'USER_LAST_NAME' => $lastname,
            'USER_EMAIL' => $email,
            'USER_HASHED_PASSWORD' => password_hash($password, PASSWORD_DEFAULT), // optional but recommended
            'USER_ID' => 1,
            'USER_IS_ACTIVE' => true
        ]);

        if ($result) {
            return $this->jsonSuccess(
                ['redirect_url' => '/auth/login'],
                'User registered successfully'
            );
        } else {
            return $this->jsonError('Registration failed');
        }
    }
}





?>