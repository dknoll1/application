<?php
# Author: Daniel Knoll
# Date:   2/3/2023
# Desc:   Index/controller of job application website -->


// This is my controller

ini_set('display_errors', 1);
error_reporting(E_ALL);

//start a sessio
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

$f3->route('GET|POST /app1', function($f3) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $state = $_POST['state'];
        $phone = $_POST['phone'];

        $f3->set('SESSION.firstName', $firstName);
        $f3->set('SESSION.lastName', $lastName);
        $f3->set('SESSION.email', $email);
        $f3->set('SESSION.state', $state);
        $f3->set('SESSION.phone', $phone);

        $f3->reroute('app2');
    }
    $view = new Template();
    echo $view->render('views/app1.html');
});

$f3->route('GET|POST /app2', function($f3) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $biography = $_POST['biography'];
        $github = $_POST['github'];
        $years = $_POST['years'];
        $relocate = $_POST['relocate'];

        $f3->set('SESSION.biography', $biography);
        $f3->set('SESSION.github', $github);
        $f3->set('SESSION.years', $years);
        $f3->set('SESSION.relocate', $relocate);

        $f3->reroute('app3');
    }
    $view = new Template();
    echo $view->render('views/app2.html');
});

$f3->route('GET|POST /app3', function($f3) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $softwareJobs = $_POST['software'];
        $industryVerticals = $_POST['verticals'];

        $f3->set('SESSION.software', array($softwareJobs));
        $f3->set('SESSION.verticals', array($industryVerticals));

        $f3->reroute('summary');
    }
    $view = new Template();
    echo $view->render('views/app3.html');
});


$f3->route('GET /summary', function() {
    $view = new Template();
    echo $view->render('views/summary.html');
});
// Run Fat Free
$f3->run();