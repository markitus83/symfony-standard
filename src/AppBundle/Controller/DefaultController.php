<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\ProducerType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Template
     */
    public function indexAction()
    {
        $actions['producer'][] = array('label'=>'New Producers', 'link'=>$this->generateUrl('new_producer'));
        $actions['producer'][] = array('label'=>'List Producers', 'link'=>$this->generateUrl('list_producers'));

        $actions['person'][] = array('label'=>'New Person', 'link'=>$this->generateUrl('new_person'));
        $actions['person'][] = array('label'=>'List Persons', 'link'=>$this->generateUrl('list_persons'));

        $actions['movie'][] = array('label'=>'New Movie', 'link'=>$this->generateUrl('new_movie'));
        $actions['movie'][] = array('label'=>'List Movies', 'link'=>$this->generateUrl('list_movies'));

        return array('actions'=>$actions);
    }
}
