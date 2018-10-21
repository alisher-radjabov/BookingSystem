<?php

namespace DivingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DivingBundle:Default:index.html.twig');
    }
}
