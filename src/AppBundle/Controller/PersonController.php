<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\PersonType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class PersonController extends Controller
{
    /**
     * @Template
     */
    public function newAction(Request $request)
    {
        $formType = new PersonType();

        $form = $this->get('form.factory')->create($formType);

        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {
                $person =$form->getData();

                $em = $this->getDoctrine()->getManager();

                $em->persist($person);
                $em->flush();

                return new RedirectResponse(
                    $this->generateUrl(
                        'edit_person',
                        array(
                            'idP'=>$person->getId()
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
            ->listPersons();

        return array(
            'list' => $list
        );
    }

    /**
     * @Template
     */
    public function editAction(Request $request, $idP)
    {
        $person = $this->get('cinephile')->getPerson($idP);

        $formType = new PersonType();

        $form = $this->get('form.factory')->create($formType,$person);

        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {
                $person =$form->getData();

                $em = $this->getDoctrine()->getManager();

                $em->persist($person);
                $em->flush();

                return new RedirectResponse(
                    $this->generateUrl(
                        'edit_person',
                        array(
                            'idP'=>$person->getId()
                        )
                    )
                );
            }
        }

        return array('form'=>$form->createView());
    }
}
