<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\ProducerType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ProducerController extends Controller
{
    /**
     * @Template
     */
    public function newAction(Request $request)
    {
        $formType = new ProducerType();

        $form = $this->get('form.factory')->create($formType);

        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {
                $producer =$form->getData();

                $em = $this->getDoctrine()->getManager();

                $em->persist($producer);
                $em->flush();

                return new RedirectResponse(
                    $this->generateUrl(
                        'edit_producer',
                        array(
                            'idP'=>$producer->getId()
                        )
                    )
                );
            }
        }


        return array('form'=>$form->createView());
    }

    /**
     * @Template
     */
    public function listAction()
    {
        $list = $this
            ->get('cinephile')
            ->listProducers();

        return array(
            'list' => $list
        );
    }

    /**
     * @Template
     */
    public function editAction(Request $request, $idP)
    {
        $producer = $this->get('cinephile')->getProducer($idP);

        $formType = new ProducerType();

        $form = $this->get('form.factory')->create($formType,$producer);

        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {
                $producer =$form->getData();

                $em = $this->getDoctrine()->getManager();

                $em->persist($producer);
                $em->flush();

                return new RedirectResponse(
                    $this->generateUrl(
                        'edit_producer',
                        array(
                            'idP'=>$producer->getId()
                        )
                    )
                );
            }
        }

        return array('form'=>$form->createView());
    }
}
