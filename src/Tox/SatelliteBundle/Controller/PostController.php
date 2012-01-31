<?php

namespace Tox\SatelliteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tox\SatelliteBundle\Entity\Post;
use Tox\SatelliteBundle\Form\PostType;

/**
 * Post controller.
 *
 * @Route("/post")
 */
class PostController extends Controller
{
    /**
     * Lists all Post entities.
     *
     * @Route("/", name="post")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ToxSatelliteBundle:Post')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Post post.
     *
     * @Route("/{id}/show", name="post_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $post = $em->getRepository('ToxSatelliteBundle:Post')->find($id);

        if (!$post) {
            throw $this->createNotFoundException('Unable to find Post post.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'post'      => $post,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Post post.
     *
     * @Route("/new", name="post_new")
     * @Template()
     */
    public function newAction()
    {
        $post = new Post();
        $form   = $this->createForm(new PostType(), $post);

        return array(
            'post' => $post,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Post post.
     *
     * @Route("/create", name="post_create")
     * @Method("post")
     * @Template("ToxSatelliteBundle:Post:new.html.twig")
     */
    public function createAction()
    {
        $post  = new Post();
        $request = $this->getRequest();
        $form    = $this->createForm(new PostType(), $post);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $post->setIsPage(true);
            $em->persist($post);
            $em->flush();

            return $this->redirect($this->generateUrl('post_show', array('id' => $post->getId())));
            
        }

        return array(
            'post' => $post,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Post post.
     *
     * @Route("/{id}/edit", name="post_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $post = $em->getRepository('ToxSatelliteBundle:Post')->find($id);

        if (!$post) {
            throw $this->createNotFoundException('Unable to find Post post.');
        }

        $editForm = $this->createForm(new PostType(), $post);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'post'      => $post,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Post post.
     *
     * @Route("/{id}/update", name="post_update")
     * @Method("post")
     * @Template("ToxSatelliteBundle:Post:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $post = $em->getRepository('ToxSatelliteBundle:Post')->find($id);

        if (!$post) {
            throw $this->createNotFoundException('Unable to find Post post.');
        }

        $editForm   = $this->createForm(new PostType(), $post);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $post->setIsPage(true);
            $em->persist($post);
            $em->flush();

            return $this->redirect($this->generateUrl('post_show', array('id' => $id)));
        }

        return array(
            'post'      => $post,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Post post.
     *
     * @Route("/{id}/delete", name="post_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $post = $em->getRepository('ToxSatelliteBundle:Post')->find($id);

            if (!$post) {
                throw $this->createNotFoundException('Unable to find Post post.');
            }

            $em->remove($post);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('post'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
