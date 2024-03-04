<?php
/*
 * desc: mailing list applicant Class
 * Author: Daniel Knoll
 * date: 3/3/2024
 */
class Applicant_SubscribedToLists extends Applicant
{
    private array $_selectionsJobs;
    private array $_selectionsVerticals;


    /**
     * constructor calls the parent constructor and provides the variables a normal applicant uses
     * @param $fname
     * @param $lname
     * @param $email
     * @param $state
     * @param $phone
     */
    public function __construct($fname, $lname, $email, $state, $phone)
    {
        parent::__construct($fname, $lname, $email, $state, $phone);
    }
    /**
     * @return array of strings
     */
    public function getSelectionsJobs()
    {
        return $this->_selectionsJobs;
    }

    /**
     * @param array $selectionsJobs
     */
    public function setSelectionsJobs($selectionsJobs): void
    {
        $this->_selectionsJobs = $selectionsJobs;
    }

    /**
     * @return array of strings
     */
    public function getSelectionsVerticals()
    {
        return $this->_selectionsVerticals;
    }

    /**
     * @param array $selectionsVerticals
     */
    public function setSelectionsVerticals($selectionsVerticals): void
    {
        $this->_selectionsVerticals = $selectionsVerticals;
    }
}