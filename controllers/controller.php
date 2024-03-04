<?php

/**
 * 328/application/controllers/controller.php
 * The Controller class for my Job Application app
 * Author: Daniel Knoll
 * 3/2/2024
 * */

class Controller
{
    private $_f3; //Fat-free router

    /**
     * constructor to assign f3 to this classes private variable
     * @param $f3
     */
    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    /**
     * home function when called displays homepage
     * @return void
     */
    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    /**
     * app1 function, calls the validation class for variables and then sets them using f3
     * @param $f3
     * @return void
     */
    function app1($f3): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (Validate::validName($_POST['firstName'])) {
                $firstName = $_POST['firstName'];
            } else {
                $this->_f3->set('errors["firstName"]', "Invalid name. 
                    Use English Alphabetical letters only!");
            }
            if (Validate::validName($_POST['lastName'])) {
                $lastName = $_POST['lastName'];
            } else {
                $this->_f3->set('errors["lastName"]', "Invalid name. 
                    Use English Alphabetical letters only!");
            }
            if (Validate::validEmail($_POST['email'])) {
                $email = $_POST['email'];
            } else {
                $this->_f3->set('errors["email"]', "Invalid email address.");
            }
            $state = $_POST['state'];
            if (Validate::validPhone($_POST['phone'])) {
                $phone = $_POST['phone'];
            } else {
                $this->_f3->set('errors["phone"]', "Invalid phone number.");
            }
            $this->_f3->set('SESSION.mailing', $_POST['mailing']);
            if (empty($this->_f3->get('errors'))) {
                if ($this->_f3->get('SESSION.mailing') !== null) {
                    // Instantiate an applicant who wants mailing lists object
                    $applicant = new Applicant_SubscribedToLists($firstName, $lastName, $email, $state, $phone);
                } else {
                    // Instantiate a normal applicant object
                    $applicant = new Applicant($firstName, $lastName, $email, $state, $phone);
                }
                // Put the object in the session array
                $this->_f3->set('SESSION.application', $applicant);
                // Redirect to app2 route
                $this->_f3->reroute('app2');
            }
        }

        $view = new Template();
        echo $view->render('views/app1.html');
    }

    /**
     * another application page that has more called to the validate class and then uses
     * some setters found in the applicant class
     * @param $f3
     * @return void
     */
    function app2($f3)
    {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $biography = $_POST['biography'];
            if (Validate::validGithub($_POST['github'])) {
                $github = $_POST['github'];
            }
            else {
                $this->_f3->set('errors["github"]', "Invalid URL.");
            }
            if (Validate::validExperience($_POST['years'])) {
                $years = $_POST['years'];
            }
            else {
                $this->_f3->set('errors["experience"]', "Invalid selection.");
            }
            $relocate = $_POST['relocate'];

            $this->_f3->get('SESSION.application')->setGithub($github);
            $this->_f3->get('SESSION.application')->setExperience($years);
            $this->_f3->get('SESSION.application')->setRelocate($relocate);
            $this->_f3->get('SESSION.application')->setBio($biography);

            if (empty($this->_f3->get('errors'))) {
                if ($this->_f3->get('SESSION.mailing') != NULL)
                    $this->_f3->reroute('app3');
                else
                    $this->_f3->reroute('summary');
            }
        }

        $view = new Template();
        echo $view->render('views/app2.html');


    }

    /**
     * another application page that assigned the arrays of mailing lists for mailing
     * list subscribed applicants
     * @param $f3
     * @return void
     */
    function app3($f3)
    {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $softwareJobs = $_POST['software'];
            $industryVerticals = $_POST['verticals'];

            $this->_f3->get('SESSION.application')->setSelectionsJobs($softwareJobs);
            $this->_f3->get('SESSION.application')->setSelectionsVerticals($industryVerticals);

            $this->_f3->reroute('summary');
        }
        $view = new Template();
        echo $view->render('views/app3.html');
    }

    /**
     * the summary page which calls the views template to handle spitting out the variables.
     * @param $f3
     * @return void
     */
    function summary($f3)
    {
        $view = new Template();
        echo $view->render('views/summary.html');
    }
}