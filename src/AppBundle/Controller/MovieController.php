<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\MovieType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class MovieController extends Controller
{
    /**
     * @Template
     */
    public function newAction(Request $request)
    {
        $formType = new MovieType();

        $form = $this->get('form.factory')->create($formType);

        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {
                $movie =$form->getData();

                $em = $this->getDoctrine()->getManager();

                $em->persist($movie);
                $em->flush();

                return new RedirectResponse(
                    $this->generateUrl(
                        'edit_movie',
                        array(
                            'idP'=>$movie->getId()
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
            ->listMovies();

        return array(
            'list' => $list
        );
    }

    /**
     * @Template
     */
    public function editAction(Request $request, $idP)
    {
        $movie = $this->get('cinephile')->getMovie($idP);

        $formType = new MovieType();

        $form = $this->get('form.factory')->create($formType,$movie);

        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {
                $movie =$form->getData();

                $em = $this->getDoctrine()->getManager();

                $em->persist($movie);
                $em->flush();

                return new RedirectResponse(
                    $this->generateUrl(
                        'edit_movie',
                        array(
                            'idP'=>$movie->getId()
                        )
                    )
                );
            }
        }

        return array('form'=>$form->createView());
    }
}
