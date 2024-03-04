<?php
# Author: Daniel Knoll
# Date:   2/3/2023
# Desc:   Index/controller of job application website -->

ini_set('display_errors', 1);
error_reporting(E_ALL);

//start a sessio
session_start();
// Require autoload file
require_once('vendor/autoload.php');
// Instantiate F3 Base Class
$f3 = Base::instance();
$con = new Controller($f3);

// Define a default route (328/application)
$f3->route('GET /', function() {
    $GLOBALS['con']->home();
});

$f3->route('GET|POST /app1', function($f3) {
    $GLOBALS['con']->app1($f3);
});

$f3->route('GET|POST /app2', function($f3) {
    $GLOBALS['con']->app2($f3);
});

$f3->route('GET|POST /app3', function($f3) {
    $GLOBALS['con']->app3($f3);
});


$f3->route('GET /summary', function($f3) {
    $GLOBALS['con']->summary($f3);
});
// Run Fat Free
$f3->run();