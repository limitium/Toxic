<?php

namespace Tox\PlaceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tox\PlaceBundle\Entity\Register;
use Tox\PlaceBundle\Entity\RegisterAccount;
use Tox\PlaceBundle\Form\RegisterType;

/**
 * Register controller.
 *
 * @Route("/register")
 */
class RegisterController extends Controller {
    /**
     * Lists all Register entities.
     *
     * @Route("/", name="register")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ToxPlaceBundle:Register')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Register entity.
     *
     * @Route("/{id}/show", name="register_show")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ToxPlaceBundle:Register')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Register entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),);
    }

    /**
     * Displays a form to create a new Register entity.
     *
     * @Route("/new", name="register_new")
     * @Template()
     */
    public function newAction() {
        $register = new Register();
        $account = new RegisterAccount();
        $account->setRegister($register);
        $register->addRegisterAccount($account);

        $form = $this->createForm(new RegisterType(), $register);

        return array(
            'register' => $register,
            'form' => $form->createView()
        );
    }

    /**
     * Creates a new Register entity.
     *
     * @Route("/create", name="register_create")
     * @Method("post")
     * @Template("ToxPlaceBundle:Register:new.html.twig")
     */
    public function createAction() {
        $register = new Register();
        $request = $this->getRequest();
        $form = $this->createForm(new RegisterType(), $register);
        $form->bindRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($register);
            foreach ($register->getAccounts() as $k => $account) {
                if (!$account->getUsername()) {
                    $register->removeRegisterAccount($account);
                } else {
                    $account->setRegister($register);
                    $em->persist($account);
                }
            }
            $em->flush();

            return $this->redirect($this->generateUrl('register_show', array('id' => $register->getId())));

        }

        return array(
            'register' => $register,
            'form' => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Register entity.
     *
     * @Route("/{id}/edit", name="register_edit")
     * @Template()
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getEntityManager();

        $register = $em->getRepository('ToxPlaceBundle:Register')->find($id);

        if (!$register) {
            throw $this->createNotFoundException('Unable to find Register entity.');
        }

        $editForm = $this->createForm(new RegisterType(), $register);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'register' => $register,
            'form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Register entity.
     *
     * @Route("/{id}/update", name="register_update")
     * @Method("post")
     * @Template("ToxPlaceBundle:Register:edit.html.twig")
     */
    public function updateAction($id) {
        $em = $this->getDoctrine()->getEntityManager();

        $register = $em->getRepository('ToxPlaceBundle:Register')->find($id);

        if (!$register) {
            throw $this->createNotFoundException('Unable to find Register entity.');
        }

        $editForm = $this->createForm(new RegisterType(), $register);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($register);
            foreach ($register->getAccounts() as $k => $account) {
                $account->setRegister($register);
                $em->persist($account);
            }
            $em->flush();

            return $this->redirect($this->generateUrl('register_show', array('id' => $id)));
        }

        return array(
            'register' => $register,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Register entity.
     *
     * @Route("/{id}/delete", name="register_delete")
     * @Method("post")
     */
    public function deleteAction($id) {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ToxPlaceBundle:Register')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Register entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('register'));
    }

    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm();
    }
}
