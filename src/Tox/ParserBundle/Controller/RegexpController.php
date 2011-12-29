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

        $form   = $this->createForm(new RegexpType(), array());

        return array(
            'form'   => $form->createView()
        );
    }

    /**
     * Checks a regexp
     *
     * @Route("/check", name="regexp_check")
     * @Method("post")
     * @Template("ToxParserBundle:Regexp:new.html.twig")
     */
    public function createAction()
    {
        $request = $this->getRequest();
        $form   = $this->createForm(new RegexpType(), array());
        $form->bindRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();
            $task = new Task($data['url'],$data['regexp']);
            $parser = new Parser();
            $parser->execute($task);

            print_r($task->getResult());
        }

        return array(
            'form'   => $form->createView()
        );
    }
}
