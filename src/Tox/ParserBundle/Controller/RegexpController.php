<?php

namespace Tox\ParserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Tox\ParserBundle\Form\RegexpType;
use Tox\ParserBundle\Parser\Task;
use Tox\ParserBundle\Parser\Parser;

/**
 * Regexp controller.
 *
 * @Route("/regexp")
 */
class RegexpController extends Controller
{
    /**
     * Displays a form to check a new Regexp.
     *
     * @Route("/new", name="regexp_new")
     * @Template()
     */
    public function newAction()
    {

        return array(
            'form'   => $this->createForm(new RegexpType(), array())->createView()
        );
    }

    /**
     * Checks a regexp
     *
     * @Route("/check", name="regexp_check")
     * @Method("post")
     * @Template("ToxParserBundle:Regexp:check.html.twig")
     */
    public function createAction()
    {

        $request = $this->getRequest();
        $form   = $this->createForm(new RegexpType(), array());
        $form->bindRequest($request);

        $result =  array(
            'form'   => $form->createView()
        );
        if ($form->isValid()) {
            $data = $form->getData();
            $task = new Task($data['url'],$data['regexp']);
            $parser = new Parser();
            $parser->execute($task);
            $result['task'] = $task;
        }

        return $result;
    }
}
