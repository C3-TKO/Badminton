<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Season;
use AppBundle\Form\SeasonType;

/**
 * Season controller.
 *
 */
class SeasonController extends Controller
{

    /**
     * Lists all Season entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Season')->findAll();

        return $this->render('AppBundle:Season:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Season entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Season();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('crud_season__show', array('id' => $entity->getId())));
        }

        return $this->render('AppBundle:Season:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Season entity.
     *
     * @param Season $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Season $entity)
    {
        $form = $this->createForm(new SeasonType(), $entity, array(
            'action' => $this->generateUrl('crud_season__create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Season entity.
     *
     */
    public function newAction()
    {
        $entity = new Season();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBundle:Season:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Season entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Season')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Season entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:Season:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Season entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Season')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Season entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:Season:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Season entity.
    *
    * @param Season $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Season $entity)
    {
        $form = $this->createForm(new SeasonType(), $entity, array(
            'action' => $this->generateUrl('crud_season__update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Season entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Season')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Season entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('crud_season__edit', array('id' => $id)));
        }

        return $this->render('AppBundle:Season:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Season entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Season')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Season entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('crud_season_'));
    }

    /**
     * Creates a form to delete a Season entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('crud_season__delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
