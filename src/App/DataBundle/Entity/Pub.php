<?php

namespace App\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pub
 */
class Pub
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $details;

    /**
     * @var string
     */
    private $document;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \App\DataBundle\Entity\Publications
     */
    private $pub;


    /**
     * Set name
     *
     * @param string $name
     * @return Pub
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
     * Set details
     *
     * @param string $details
     * @return Pub
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
     * Set document
     *
     * @param string $document
     * @return Pub
     */
    public function setDocument($document)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return string 
     */
    public function getDocument()
    {
        return $this->document;
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
     * Set pub
     *
     * @param \App\DataBundle\Entity\Publications $pub
     * @return Pub
     */
    public function setPub(\App\DataBundle\Entity\Publications $pub = null)
    {
        $this->pub = $pub;

        return $this;
    }

    /**
     * Get pub
     *
     * @return \App\DataBundle\Entity\Publications 
     */
    public function getPub()
    {
        return $this->pub;
    }
}
