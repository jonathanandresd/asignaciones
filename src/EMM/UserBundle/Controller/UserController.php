<?php

namespace EMM\UserBundle\Controller;

use EMM\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

class UserController extends Controller
{
    public function articlesAction($page)
    {
        $page2 = "http://www.".$page.".com";

        $href = "<a href='".$page2."' >".$page2."</a>";
        return new Response('Este es mi artículo en la página: '. $href);
    }

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('EMMUserBundle:User')->findAll();

        return $this->render('EMMUserBundle:User:index.html.twig',array('users' =>$users));
    }

    public function addAction()
    {
        $user = new User();
        $user->setCreatedAt(date_create("2013-10-30"));
        $user->setEmail('asdasd@gmail.com');
        $user->setFirstName('randomFirstName');
        $user->setIsActive(1);
        $user->setPassword('xd');
        $user->setRole('ROLE_USER');
        $user->setUsername('randomUsername');
        $user->setUpdatedAt(date_create("2015-10-30"));
        $user->setLastName('randomLastName');

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($user);
        $em->flush();

        return $this->redirect($this->generateUrl("emm_user_index"));
    }

    public function viewAction($id)
    {
        //

    }

    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('EMMUserBundle:User')->find($id);

        $user->setFirstName('editedFirstName');
        $user->setLastName('editedFirstName');

        $em->persist($user);
        $em->flush();

        return $this->redirect($this->generateUrl("emm_user_index"));
    }

    public function deleteAction($id)
    {
       $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('EMMUserBundle:User')->find($id);

        $em->remove($user);
        $em->flush();

        return $this->redirect($this->generateUrl("emm_user_index"));
    }
}