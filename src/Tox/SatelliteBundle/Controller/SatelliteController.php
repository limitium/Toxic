<?php

namespace Tox\SatelliteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tox\SatelliteBundle\Entity\Satellite;
use Tox\SatelliteBundle\Form\SatelliteType;

/**
 * Satellite controller.
 *
 * @Route("/satellite")
 */
class SatelliteController extends Controller
{
    /**
     * Lists all Satellite entities.
     *
     * @Route("/", name="satellite")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ToxSatelliteBundle:Satellite')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Satellite entity.
     *
     * @Route("/{id}/show", name="satellite_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ToxSatelliteBundle:Satellite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Satellite entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Satellite entity.
     *
     * @Route("/new", name="satellite_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Satellite();
        $form   = $this->createForm(new SatelliteType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Satellite entity.
     *
     * @Route("/create", name="satellite_create")
     * @Method("post")
     * @Template("ToxSatelliteBundle:Satellite:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Satellite();
        $request = $this->getRequest();
        $form    = $this->createForm(new SatelliteType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('satellite_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Satellite entity.
     *
     * @Route("/{id}/edit", name="satellite_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ToxSatelliteBundle:Satellite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Satellite entity.');
        }

        $editForm = $this->createForm(new SatelliteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Satellite entity.
     *
     * @Route("/{id}/update", name="satellite_update")
     * @Method("post")
     * @Template("ToxSatelliteBundle:Satellite:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ToxSatelliteBundle:Satellite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Satellite entity.');
        }

        $editForm   = $this->createForm(new SatelliteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('satellite_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Satellite entity.
     *
     * @Route("/{id}/delete", name="satellite_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ToxSatelliteBundle:Satellite')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Satellite entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('satellite'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
