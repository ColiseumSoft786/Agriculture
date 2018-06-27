<?php

namespace App\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rates
 */
class Rates
{
    /**
     * @var integer
     */
    private $rate;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \App\DataBundle\Entity\City
     */
    private $city;

    /**
     * @var \App\DataBundle\Entity\Item
     */
    private $item;


    /**
     * Set rate
     *
     * @param integer $rate
     * @return Rates
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return integer 
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Rates
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
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
     * Set city
     *
     * @param \App\DataBundle\Entity\City $city
     * @return Rates
     */
    public function setCity(\App\DataBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \App\DataBundle\Entity\City 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set item
     *
     * @param \App\DataBundle\Entity\Item $item
     * @return Rates
     */
    public function setItem(\App\DataBundle\Entity\Item $item = null)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return \App\DataBundle\Entity\Item 
     */
    public function getItem()
    {
        return $this->item;
    }
}
