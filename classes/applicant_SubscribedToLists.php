<?php

class Applicant_SubscribedToLists extends Applicant
{
    private Array $_selectionsJobs;
    private Array $_selectionsVerticals;


    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @return mixed
     */
    public function getSelectionsJobs()
    {
        return $this->_selectionsJobs;
    }

    /**
     * @param mixed $selectionsJobs
     */
    public function setSelectionsJobs($selectionsJobs): void
    {
        $this->_selectionsJobs = $selectionsJobs;
    }

    /**
     * @return mixed
     */
    public function getSelectionsVerticals()
    {
        return $this->_selectionsVerticals;
    }

    /**
     * @param mixed $selectionsVerticals
     */
    public function setSelectionsVerticals($selectionsVerticals): void
    {
        $this->_selectionsVerticals = $selectionsVerticals;
    }
}