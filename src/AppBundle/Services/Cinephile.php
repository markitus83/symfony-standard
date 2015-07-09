<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 9/07/15
 * Time: 14:48
 */

namespace AppBundle\Services;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Movie;
use AppBundle\Entity\Person;
use AppBundle\Entity\Producer;

class Cinephile
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /*
     * Services for Producers
     */
    public function listProducers()
    {
        return $this->em->getRepository('AppBundle:Producer')->findAll();
    }

    public function getProducer($id)
    {
        return $this->em->getRepository('AppBundle:Producer')->find($id);
    }

    /*
     * Services for Persons
     */
    public function listPersons()
    {
        return $this->em->getRepository('AppBundle:Person')->findAll();
    }

    public function getPerson($id)
    {
        return $this->em->getRepository('AppBundle:Person')->find($id);
    }

    /*
     * Services for Movies
     */
    public function listMovies()
    {
        return $this->em->getRepository('AppBundle:Movie')->findAll();
    }

    public function getMovie($id)
    {
        return $this->em->getRepository('AppBundle:Movie')->find($id);
    }
}