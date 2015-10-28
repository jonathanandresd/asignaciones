<?php

namespace EMM\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function indexAction()
    {
        //return $this->render('EMMUserBundle:Default:index.html.twig', array('name' => $name));
        //return new Response('Bienvenido a mi módulo de usuarios');
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('EMMUserBundle:User')->findAll();

        $res = 'Lista de usuarios: <br />';
        foreach ($users as $user) {
            $res .= 'Usuario: '. $user->getUsername().' Email: '. $user->getEmail(). '<br />';
        }
        return new Response($res);
    }

    public function articlesAction($page)
    {
        $page2 = "http://www.".$page.".com";

        $href = "<a href='".$page2."' >".$page2."</a>";
        return new Response('Este es mi artículo en la página: '. $href);
    }

    public function addAction($page)
    {
        $page2 = "http://www.".$page.".com";

        $href = "<a href='".$page2."' >".$page2."</a>";
        return new Response('Este es mi artículo en la página: '. $href);
    }

    public function viewAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('EMMUserBundle:User');
        $user = $repository->find($id);

        return new Response('Usuario: '. $user->getUsername(). ' con email:'. $user->getEmail());
    }

    public function editAction($page)
    {
        $page2 = "http://www.".$page.".com";

        $href = "<a href='".$page2."' >".$page2."</a>";
        return new Response('Este es mi artículo en la página: '. $href);
    }

    public function deleteAction($page)
    {
        $page2 = "http://www.".$page.".com";

        $href = "<a href='".$page2."' >".$page2."</a>";
        return new Response('Este es mi artículo en la página: '. $href);
    }
}