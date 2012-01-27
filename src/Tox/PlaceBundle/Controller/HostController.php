<?php

namespace Tox\PlaceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tox\PlaceBundle\Entity\Host;
use Tox\PlaceBundle\Entity\HostAccount;
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
     * Finds and displays a Host host.
     *
     * @Route("/{id}/show", name="host_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $host = $em->getRepository('ToxPlaceBundle:Host')->find($id);

        if (!$host) {
            throw $this->createNotFoundException('Unable to find Host host.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'host'      => $host,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Host host.
     *
     * @Route("/new", name="host_new")
     * @Template()
     */
    public function newAction()
    {
        $host = new Host();
        $account = new HostAccount();
        $account->setHost($host);
        $host->addHostAccount($account);
        $form   = $this->createForm(new HostType(), $host);

        return array(
            'host' => $host,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Host host.
     *
     * @Route("/create", name="host_create")
     * @Method("post")
     * @Template("ToxPlaceBundle:Host:new.html.twig")
     */
    public function createAction()
    {
        $host = new Host();
        $request = $this->getRequest();
        $form = $this->createForm(new HostType(), $host);
        $form->bindRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($host);
            foreach ($host->getAccounts() as $k => $account) {
                if (!$account->getUsername()) {
                    $host->removeHostAccount($account);
                } else {
                    $account->setHost($host);
                    $em->persist($account);
                }
            }
            $em->flush();

            return $this->redirect($this->generateUrl('host_show', array('id' => $host->getId())));

        }

        return array(
            'host' => $host,
            'form' => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Host host.
     *
     * @Route("/{id}/edit", name="host_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $host = $em->getRepository('ToxPlaceBundle:Host')->find($id);

        if (!$host) {
            throw $this->createNotFoundException('Unable to find Host host.');
        }

        $editForm = $this->createForm(new HostType(), $host);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'host'      => $host,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Host host.
     *
     * @Route("/{id}/update", name="host_update")
     * @Method("post")
     * @Template("ToxPlaceBundle:Host:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $host = $em->getRepository('ToxPlaceBundle:Host')->find($id);

        if (!$host) {
            throw $this->createNotFoundException('Unable to find Host host.');
        }

        $editForm   = $this->createForm(new HostType(), $host);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($host);
            $em->flush();

            return $this->redirect($this->generateUrl('host_edit', array('id' => $id)));
        }

        return array(
            'host'      => $host,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Host host.
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
            $host = $em->getRepository('ToxPlaceBundle:Host')->find($id);

            if (!$host) {
                throw $this->createNotFoundException('Unable to find Host host.');
            }

            $em->remove($host);
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
