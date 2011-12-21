<?php

namespace Tox\SatelliteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('ToxSatelliteBundle:Default:index.html.twig', array('name' => $name));
    }
}
