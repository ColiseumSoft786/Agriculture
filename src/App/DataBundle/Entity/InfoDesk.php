<?php

namespace App\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfoDesk
 */
class InfoDesk
{
    /**
     * @var integer
     */
    private $nId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $img;

    /**
     * @var string
     */
    private $details;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set nId
     *
     * @param integer $nId
     * @return InfoDesk
     */
    public function setNId($nId)
    {
        $this->nId = $nId;

        return $this;
    }

    /**
     * Get nId
     *
     * @return integer 
     */
    public function getNId()
    {
        return $this->nId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return InfoDesk
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set img
     *
     * @param string $img
     * @return InfoDesk
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string 
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set details
     *
     * @param string $details
     * @return InfoDesk
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
}
