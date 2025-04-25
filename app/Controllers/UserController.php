<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController{

    public function user_dashboard(){
        $this->render('User/dashboard');
    }


}



?>