<?php
$router -> setBasepath(''); // Set this if your app is in a subdirectory

//for landing page 
$router -> map('GET','/','App\Controllers\HomeController#index','home');

//public pages
$router -> map('GET','/auth','App\Controllers\AuthController#login_register','login_register');


//for users
$router -> map('GET','/services','App\Controllers\ServicesController#services','services');




?>