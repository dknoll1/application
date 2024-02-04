<?php
# Author: Daniel Knoll
# Date:   2/3/2023
# Desc:   Index/controller of job application website -->


// This is my controller

ini_set('display_errors', 1);
error_reporting(E_ALL);

//start a session
session_start();
// Require autoload file
require_once('vendor/autoload.php');

// Instantiate F3 Base Class
$f3 = Base::instance();

// Define a default route (328/application)
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/home.html');
});

// Run Fat Free
$f3->run();