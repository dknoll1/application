<?php

/**
 * applicant for job application app
 * @author Daniel Knoll
 * @copyright 2024
 */
class Applicant
{
    private string $_fname;
    private string $_lname;
    private string $_email;
    private string $_state;
    private string $_phone;
    private string $_github;
    private string $_experience;
    private string $_relocate;
    private string $_bio;

    /**
     * Default constructor instantiates an applicant object
     * new applicant(fname, lname, email, state, phone)
     * @param string $fname
     * @param string $lname
     * @param string $email
     * @param string $state
     * @param string $phone
     */
    public function __construct($fname="", $lname="", $email="", $state="", $phone="")
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_email = $email;
        $this->_state = $state;
        $this->_phone = $phone;
    }

    /**
     * @return string
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * @param string $fname
     */
    public function setFname($fname): void
    {
        $this->_fname = $fname;
    }

    /**
     * @return string
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * @param string $lnanme
     */
    public function setLnanme($lnanme): void
    {
        $this->_lnanme = $lnanme;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email): void
    {
        $this->_email = $email;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param string $state
     */
    public function setState($state): void
    {
        $this->_state = $state;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone): void
    {
        $this->_phone = $phone;
    }

    /**
     * @return string
     */
    public function getGithub()
    {
        return $this->_github;
    }

    /**
     * @param string $github
     */
    public function setGithub($github="")
    {
        $this->_github = $github="";
    }

    /**
     * @return string
     */
    public function getExperience()
    {
        return $this->_experience;
    }

    /**
     * @param string $experience
     */
    public function setExperience($experience): void
    {
        $this->_experience = $experience;
    }

    /**
     * @return string
     */
    public function getRelocate()
    {
        return $this->_relocate;
    }

    /**
     * @param string $relocate
     */
    public function setRelocate($relocate): void
    {
        $this->_relocate = $relocate;
    }

    /**
     * @return string
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * @param string $bio
     */
    public function setBio($bio): void
    {
        $this->_bio = $bio;
    }
}
