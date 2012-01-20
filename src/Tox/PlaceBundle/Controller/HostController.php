<?php

namespace Tox\PlaceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tox\PlaceBundle\Entity\Host;
use Tox\PlaceBundle\Form\HostType;

/**
 * Host controller.
 *
 * @Route("/host")
 */
class HostController extends Controller
{
    /**
     * Lists all Host entities.
     *
     * @Route("/", name="host")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ToxPlaceBundle:Host')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Host entity.
     *
     * @Route("/{id}/show", name="host_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ToxPlaceBundle:Host')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Host entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Host entity.
     *
     * @Route("/new", name="host_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Host();
        $form   = $this->createForm(new HostType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Host entity.
     *
     * @Route("/create", name="host_create")
     * @Method("post")
     * @Template("ToxPlaceBundle:Host:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Host();
        $request = $this->getRequest();
        $form    = $this->createForm(new HostType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('host_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Host entity.
     *
     * @Route("/{id}/edit", name="host_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ToxPlaceBundle:Host')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Host entity.');
        }

        $editForm = $this->createForm(new HostType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Host entity.
     *
     * @Route("/{id}/update", name="host_update")
     * @Method("post")
     * @Template("ToxPlaceBundle:Host:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ToxPlaceBundle:Host')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Host entity.');
        }

        $editForm   = $this->createForm(new HostType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('host_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Host entity.
     *
     * @Route("/{id}/delete", name="host_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ToxPlaceBundle:Host')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Host entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('host'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
