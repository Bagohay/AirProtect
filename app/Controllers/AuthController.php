<?php

namespace App\Controllers;

use DateTime;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Core\AvatarGenerator;
use Core\Cookie;

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

    public function Login(){

        if(!$this->isPost() || !$this->isAjax()){
            return $this->jsonError('Invalid request method');
        }

        $data=$this->getJsonInput();

        $email=$data['email'] ?? '';
        $password=$data['password']?? '';
        $remember=isset($data['remember']);

        $user=$this->userModel->findByEmail($email);

        if(!$user){
            return $this->jsonError("Invalid email or password");
        }

        if($user['user_delete_at'] !== null){
            return $this->jsonError('This account has been deactivated');
        }

        if(!$this->userModel->verifyPassword($password,$user['user_password'])){
            return $this->jsonError('Invalid email or password');
        }
        
        if (!$user['is_active']) {
            return $this->jsonError('Account is inactive');
        }

        $this->userModel->updateLastLogin($user['id']);

        //GLOBAL THE VALUES 

        $_SESSION['user_id']=$user['user_id'];
        $_SESSION['PROFILE_URL']=$user['user_profile_url'];
        $_SESSION['FIRST_NAME']=$user['user_first_name'];
        $_SESSION['MIDDLE_NAME'] = !empty($user['user_middle_name']) 
        ? strtoupper(substr($user['user_middle_name'], 0, 1)) . '.' 
        : '';
        $_SESSION['LAST_NAME']=$user['user_last_name'];
        $_SESSION['EMAIL']=$user['user_email'];
        $_SESSION['PHONE_NUMBER']=$user['user_email'];
        $_SESSION['USER_ROLE']=$user['role_name'] ?? "Customer";
        $_SESSION['member_since'] = (new DateTime($user['created_at']))->format('F j, Y');

        if($remember){
            $token=$this->userModel->generateRememberToken($user['user_id'],30);
            Cookie:: set('user_remember_token',$token,30);
        }

        $role=$user['role_name'] ?? '/';
        $redirectUrl= match($role){
            'Customer' =>'/User/dashboard',
            'Technician' =>'/technician/dashboard',
            'Admin' =>  '/admin/dashboard',
            default => '/'
        };

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
            'USER_MIDDLE_NAME' => $middlename,
            'USER_LAST_NAME' => $lastname,
            'USER_EMAIL' => $email,
            'USER_PASSWORD' => password_hash($password, PASSWORD_DEFAULT), // optional but recommended
            'USER_ID' => 1,
            'USER_IS_ACTIVE' => true
        ]);

        if (!$result) {
            return $this->jsonError('Failed to register user. Please try again.');
        }

        return $this->jsonSuccess('User registered successfully!');
    }
}





?>