<?php

namespace Tox\PlaceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tox\PlaceBundle\Entity\FtpAccount;
use Tox\PlaceBundle\Form\FtpAccountType;

/**
 * FtpAccount controller.
 *
 * @Route("/ftpaccount")
 */
class FtpAccountController extends Controller
{
    /**
     * Lists all FtpAccount entities.
     *
     * @Route("/", name="ftpaccount")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ToxPlaceBundle:FtpAccount')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a FtpAccount entity.
     *
     * @Route("/{id}/show", name="ftpaccount_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ToxPlaceBundle:FtpAccount')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FtpAccount entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new FtpAccount entity.
     *
     * @Route("/new", name="ftpaccount_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new FtpAccount();
        $form   = $this->createForm(new FtpAccountType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new FtpAccount entity.
     *
     * @Route("/create", name="ftpaccount_create")
     * @Method("post")
     * @Template("ToxPlaceBundle:FtpAccount:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new FtpAccount();
        $request = $this->getRequest();
        $form    = $this->createForm(new FtpAccountType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ftpaccount_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing FtpAccount entity.
     *
     * @Route("/{id}/edit", name="ftpaccount_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ToxPlaceBundle:FtpAccount')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FtpAccount entity.');
        }

        $editForm = $this->createForm(new FtpAccountType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing FtpAccount entity.
     *
     * @Route("/{id}/update", name="ftpaccount_update")
     * @Method("post")
     * @Template("ToxPlaceBundle:FtpAccount:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ToxPlaceBundle:FtpAccount')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FtpAccount entity.');
        }

        $editForm   = $this->createForm(new FtpAccountType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ftpaccount_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a FtpAccount entity.
     *
     * @Route("/{id}/delete", name="ftpaccount_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ToxPlaceBundle:FtpAccount')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FtpAccount entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ftpaccount'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
