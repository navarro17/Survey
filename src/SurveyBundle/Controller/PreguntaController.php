<?php

namespace SurveyBundle\Controller;

use SurveyBundle\Entity\Pregunta;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Pregunta controller.
 *
 */
class PreguntaController extends Controller
{
    /**
     * Lists all pregunta entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $preguntas = $em->getRepository('SurveyBundle:Pregunta')->findAll();

        return $this->render('pregunta/index.html.twig', array(
            'preguntas' => $preguntas,
        ));
    }

    /**
     * Creates a new pregunta entity.
     *
     */
    public function newAction(Request $request)
    {
        $pregunta = new Pregunta();
        $form = $this->createForm('SurveyBundle\Form\PreguntaType', $pregunta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pregunta);
            $em->flush();

            return $this->redirectToRoute('pregunta_show', array('id' => $pregunta->getId()));
        }

        return $this->render('pregunta/new.html.twig', array(
            'pregunta' => $pregunta,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pregunta entity.
     *
     */
    public function showAction(Pregunta $pregunta)
    {
        $deleteForm = $this->createDeleteForm($pregunta);

        return $this->render('pregunta/show.html.twig', array(
            'pregunta' => $pregunta,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pregunta entity.
     *
     */
    public function editAction(Request $request, Pregunta $pregunta)
    {
        $deleteForm = $this->createDeleteForm($pregunta);
        $editForm = $this->createForm('SurveyBundle\Form\PreguntaType', $pregunta);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pregunta_edit', array('id' => $pregunta->getId()));
        }

        return $this->render('pregunta/edit.html.twig', array(
            'pregunta' => $pregunta,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pregunta entity.
     *
     */
    public function deleteAction(Request $request, Pregunta $pregunta)
    {
        $form = $this->createDeleteForm($pregunta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pregunta);
            $em->flush();
        }

        return $this->redirectToRoute('pregunta_index');
    }

    /**
     * Creates a form to delete a pregunta entity.
     *
     * @param Pregunta $pregunta The pregunta entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pregunta $pregunta)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pregunta_delete', array('id' => $pregunta->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
