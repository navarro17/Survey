<?php

namespace SurveyBundle\Controller;

use SurveyBundle\Entity\Encuesta;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Encuesta controller.
 *
 */
class EncuestaController extends Controller
{
    /**
     * Lists all Encuesta entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $encuestas = $em->getRepository('SurveyBundle:Encuesta')->findAll();

        return $this->render('encuesta/index.html.twig', array(
            'encuestas' => $encuestas,
        ));
    }

    /**
     * Creates a new Encuesta entity.
     *
     */
    public function newAction(Request $request)
    {
        $Encuesta = new Encuesta();
        $form = $this->createForm('SurveyBundle\Form\EncuestaType', $Encuesta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Encuesta);
            $em->flush();

            return $this->redirectToRoute('encuesta_show', array('id' => $Encuesta->getId()));
        }

        return $this->render('encuesta/new.html.twig', array(
            'Encuesta' => $Encuesta,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Encuesta entity.
     *
     */
    public function showAction(Encuesta $Encuesta)
    {
        $deleteForm = $this->createDeleteForm($Encuesta);

        return $this->render('encuesta/show.html.twig', array(
            'Encuesta' => $Encuesta,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Encuesta entity.
     *
     */
    public function editAction(Request $request, Encuesta $Encuesta)
    {
        $deleteForm = $this->createDeleteForm($Encuesta);
        $editForm = $this->createForm('SurveyBundle\Form\EncuestaType', $Encuesta);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('encuesta_edit', array('id' => $Encuesta->getId()));
        }

        return $this->render('encuesta/edit.html.twig', array(
            'Encuesta' => $Encuesta,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Encuesta entity.
     *
     */
    public function deleteAction(Request $request, Encuesta $Encuesta)
    {
        $form = $this->createDeleteForm($Encuesta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($Encuesta);
            $em->flush();
        }

        return $this->redirectToRoute('encuesta_index');
    }

    /**
     * Creates a form to delete a Encuesta entity.
     *
     * @param Encuesta $Encuesta The Encuesta entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Encuesta $Encuesta)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('encuesta_delete', array('id' => $Encuesta->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
