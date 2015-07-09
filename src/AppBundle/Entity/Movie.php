<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 6/07/15
 * Time: 18:46
 */

namespace AppBundle\Entity;

use AppBundle\Entity\Person;
use Doctrine\Common\Collections\ArrayCollection;

class Movie
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $synopsis;

    /**
     * @var Person
     */
    protected $director;

    /**
     * @var ArrayCollection
     */
    protected $actors;

    /**
     * @var Producer
     */
    protected $producer;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    public function __construct()
    {
        $this->actors = new ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Movie
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set synopsis
     *
     * @param string $synopsis
     * @return Movie
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get synopsis
     *
     * @return string 
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Set director
     *
     * @param \AppBundle\Entity\Person $director
     * @return Movie
     */
    public function setDirector(\AppBundle\Entity\Person $director = null)
    {
        $this->director = $director;

        return $this;
    }

    /**
     * Get director
     *
     * @return \AppBundle\Entity\Person 
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Set producer
     *
     * @param \AppBundle\Entity\Producer $producer
     * @return Movie
     */
    public function setProducer(\AppBundle\Entity\Producer $producer = null)
    {
        $this->producer = $producer;

        return $this;
    }

    /**
     * Get producer
     *
     * @return \AppBundle\Entity\Producer 
     */
    public function getProducer()
    {
        return $this->producer;
    }

    /**
     * Add actors
     *
     * @param \AppBundle\Entity\Person $actors
     * @return Movie
     */
    public function addActor(\AppBundle\Entity\Person $actors)
    {
        $this->actors[] = $actors;

        return $this;
    }

    /**
     * Remove actors
     *
     * @param \AppBundle\Entity\Person $actors
     */
    public function removeActor(\AppBundle\Entity\Person $actors)
    {
        $this->actors->removeElement($actors);
    }

    /**
     * Get actors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActors()
    {
        return $this->actors;
    }
}
