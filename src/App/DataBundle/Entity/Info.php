<?php

namespace App\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Info
 */
class Info
{
    /**
     * @var string
     */
    private $mandi;

    /**
     * @var string
     */
    private $agent;

    /**
     * @var string
     */
    private $company;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $traded;

    /**
     * @var string
     */
    private $details;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \App\DataBundle\Entity\Infobank
     */
    private $info;


    /**
     * Set mandi
     *
     * @param string $mandi
     * @return Info
     */
    public function setMandi($mandi)
    {
        $this->mandi = $mandi;

        return $this;
    }

    /**
     * Get mandi
     *
     * @return string 
     */
    public function getMandi()
    {
        return $this->mandi;
    }

    /**
     * Set agent
     *
     * @param string $agent
     * @return Info
     */
    public function setAgent($agent)
    {
        $this->agent = $agent;

        return $this;
    }

    /**
     * Get agent
     *
     * @return string 
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * Set company
     *
     * @param string $company
     * @return Info
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Info
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set traded
     *
     * @param string $traded
     * @return Info
     */
    public function setTraded($traded)
    {
        $this->traded = $traded;

        return $this;
    }

    /**
     * Get traded
     *
     * @return string 
     */
    public function getTraded()
    {
        return $this->traded;
    }

    /**
     * Set details
     *
     * @param string $details
     * @return Info
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string 
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set info
     *
     * @param \App\DataBundle\Entity\Infobank $info
     * @return Info
     */
    public function setInfo(\App\DataBundle\Entity\Infobank $info = null)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return \App\DataBundle\Entity\Infobank 
     */
    public function getInfo()
    {
        return $this->info;
    }
}
