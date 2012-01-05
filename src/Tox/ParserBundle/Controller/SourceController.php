<?php

namespace Tox\ParserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tox\ParserBundle\Entity\Source;
use Tox\ParserBundle\Entity\Rule;
use Tox\ParserBundle\Form\SourceType;

/**
 * Source controller.
 *
 * @Route("/source")
 */
class SourceController extends Controller
{
    /**
     * Lists all Source entities.
     *
     * @Route("/", name="source")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ToxParserBundle:Source')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Source entity.
     *
     * @Route("/{id}/show", name="source_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ToxParserBundle:Source')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Source entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Source entity.
     *
     * @Route("/new", name="source_new")
     * @Template()
     */
    public function newAction()
    {
        $source = new Source();

        $this->addRules($source);

        $form   = $this->createForm(new SourceType(), $source);

        return array(
            'source' => $source,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Source entity.
     *
     * @Route("/create", name="source_create")
     * @Method("post")
     * @Template("ToxParserBundle:Source:new.html.twig")
     */
    public function createAction()
    {
        $source  = new Source();
        $request = $this->getRequest();
        $form = $this->createForm(new SourceType(), $source);
        $form->bindRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($source);
            foreach($source->getRules() as $k => $rule){
                if(!$rule->getPattern()){
                    $source->removeRule($rule);
                }else{
                    $rule->setSource($source);
                    $em->persist($rule);
                }
            }
            $em->flush();

            return $this->redirect($this->generateUrl('source_show', array('id' => $source->getId())));
            
        }

        return array(
            'source' => $source,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Source entity.
     *
     * @Route("/{id}/edit", name="source_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $source = $em->getRepository('ToxParserBundle:Source')->find($id);

        if (!$source) {
            throw $this->createNotFoundException('Unable to find Source entity.');
        }

        $this->addRules($source);

        $editForm = $this->createForm(new SourceType(), $source);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'source'      => $source,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    private function addRules($source) {
        $patterns = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('ToxParserBundle:PatternType')
            ->findAll();

        $usedTypes = array();
        foreach ($source->getRules() as $rule) {
            $usedTypes[] = $rule->getType();
        }

        foreach ($patterns as $pattern) {
            if (!in_array($pattern, $usedTypes)) {
                $rule = new Rule();
                $rule->setType($pattern);
                $source->addRule($rule);
            }
        }
    }

    /**
     * Edits an existing Source entity.
     *
     * @Route("/{id}/update", name="source_update")
     * @Method("post")
     * @Template("ToxParserBundle:Source:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $source = $em->getRepository('ToxParserBundle:Source')->find($id);

        if (!$source) {
            throw $this->createNotFoundException('Unable to find Source entity.');
        }

        $editForm   = $this->createForm(new SourceType(), $source);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($source);
            $em->flush();

            return $this->redirect($this->generateUrl('source_edit', array('id' => $id)));
        }

        return array(
            'source'      => $source,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Source entity.
     *
     * @Route("/{id}/delete", name="source_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ToxParserBundle:Source')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Source entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('source'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
