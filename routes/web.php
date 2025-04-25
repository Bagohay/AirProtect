<?php
$router -> setBasepath(''); // Set this if your app is in a subdirectory

//LANDING PAG E ROUTES
$router -> map('GET','/','App\Controllers\HomeController#index','home');

//AUTH ROUTHS
$router -> map('GET','/auth','App\Controllers\AuthController#login_register','login_register');
$router -> map('POST','/auth','App\Controllers\AuthController#Register','register');
$router -> map('POST','/auth/login','App\Controllers\AuthController#Login','Login');




//for users
$router -> map('GET','/services','App\Controllers\ServicesController#services','services');
$router -> map('GET','/user/dashboard','App\Controllers\UserController#user_dashboard','Userdashboard');






?>