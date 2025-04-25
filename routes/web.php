<?php
$router -> setBasepath(''); // Set this if your app is in a subdirectory

//LANDING PAG E ROUTES
$router -> map('GET','/','App\Controllers\HomeController#index','home');

//AUTH ROUTHS
$router -> map('GET','/auth/login','App\Controllers\AuthController#RenderLogin','Rneder_Login');
$router -> map('GET','/auth/register','App\Controllers\AuthController#RenderRegister','Render_Register');

$router->map('POST','/auth/login','App\Controllers\AuthController#Login','login');
$router->map('POST','/auth/register','App\Controllers\AuthController#Register','register');




//for users
$router -> map('GET','/user/dashboard','App\Controllers\UserController#user_dashboard','Userdashboard');
$router -> map('GET','/services','App\Controllers\ServicesController#services','services');







?>