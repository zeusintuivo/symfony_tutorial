<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/genus", name="genus")
     */
    public function showAction() {
        return new Response('under the sea');

    }

    /**
     * @Route("/genus/{genusName}", name="genusName")
     */
    public function show2Action($genusName) {
        return new Response('under the sea 2 ' . $genusName);

    }

    /**
     * @Route("/genus/template/{genusName}", name="genusName")
     */
    public function show3Action($genusName) {
        $templating = $this->container->get('templating');

        $html = $templating->render('genus/show.html.twig', [
                'name' => $genusName
            ]);
        return new Response($html);

    }


    /**
     * @Route("/genus/redertemplate/{genusName}", name="genusName")
     */
    public function show4Action($genusName) {

        return $this->render('genus/show.html.twig', [
                'name' => $genusName
            ]);


    }

    /**
     * @Route("/genus/templateinheritance/{genusName}", name="genusName")
     */
    public function show5Action($genusName) {

        $r = array(
            "Octopus",
            "Counted 2123",
            "I linked");
        return $this->render('genus/show2.html.twig', [
                'name' => $genusName,
                'notes' => $r
            ]);


    }
}
