<?php

namespace Tox\PlaceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tox\PlaceBundle\Entity\Domen;
use Tox\PlaceBundle\Form\DomenType;

/**
 * Domen controller.
 *
 * @Route("/domen")
 */
class DomenController extends Controller
{
    /**
     * Lists all Domen entities.
     *
     * @Route("/", name="domen")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ToxPlaceBundle:Domen')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Domen entity.
     *
     * @Route("/{id}/show", name="domen_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ToxPlaceBundle:Domen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Domen entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Domen entity.
     *
     * @Route("/new", name="domen_new")
     * @Template()
     */
    public function newAction()
    {
        $domen = new Domen();
        $form   = $this->createForm(new DomenType(), $domen);

        return array(
            'domen' => $domen,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Domen entity.
     *
     * @Route("/create", name="domen_create")
     * @Method("post")
     * @Template("ToxPlaceBundle:Domen:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Domen();
        $request = $this->getRequest();
        $form    = $this->createForm(new DomenType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('domen_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Domen entity.
     *
     * @Route("/{id}/edit", name="domen_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ToxPlaceBundle:Domen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Domen entity.');
        }

        $editForm = $this->createForm(new DomenType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Domen entity.
     *
     * @Route("/{id}/update", name="domen_update")
     * @Method("post")
     * @Template("ToxPlaceBundle:Domen:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ToxPlaceBundle:Domen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Domen entity.');
        }

        $editForm   = $this->createForm(new DomenType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('domen_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Domen entity.
     *
     * @Route("/{id}/delete", name="domen_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ToxPlaceBundle:Domen')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Domen entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('domen'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
