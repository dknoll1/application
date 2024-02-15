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
require_once('model/validate.php');

// Instantiate F3 Base Class
$f3 = Base::instance();

// Define a default route (328/application)
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /app1', function($f3) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {


        if (validName($_POST['firstName'])) {
            $firstName = $_POST['firstName'];
        }
        else {
            $f3->set('errors["firstName"]', "Invalid name. 
            Use English Alphabetical letters only!");
        }
        if (validName($_POST['lastName'])) {
            $lastName = $_POST['lastName'];
        }
        else {
            $f3->set('errors["lastName"]', "Invalid name. 
            Use English Alphabetical letters only!");
        }
        if (validEmail($_POST['email'])) {
            $email = $_POST['email'];
        }
        else {
            $f3->set('errors["email"]', "Invalid email address.");
        }
        $state = $_POST['state'];
        if (validPhone($_POST['phone'])) {
            $email = $_POST['phone'];
        }
        else {
            $f3->set('errors["phone"]', "Invalid phone number.");
        }

        $f3->set('SESSION.firstName', $firstName);
        $f3->set('SESSION.lastName', $lastName);
        $f3->set('SESSION.email', $email);
        $f3->set('SESSION.state', $state);
        $f3->set('SESSION.phone', $phone);

        if (empty($f3->get('errors'))) {
            $f3->reroute('app2');
        }
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

        $f3->set('SESSION.software', $softwareJobs);
        $f3->set('SESSION.verticals', $industryVerticals);

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