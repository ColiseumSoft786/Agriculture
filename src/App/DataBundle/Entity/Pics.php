<?php

namespace App\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pics
 */
class Pics
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set path
     *
     * @param string $path
     * @return Pics
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
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
