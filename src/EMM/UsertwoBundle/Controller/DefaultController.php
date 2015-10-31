<?php

namespace EMM\UsertwoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EMMUsertwoBundle:Default:index.html.twig', array('name' => $name));
    }
}
