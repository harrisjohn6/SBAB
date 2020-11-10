<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController extends AbstractController
{
    /**
     * @return Response
     * @Route("/welcome", methods={"GET"})
     */
    public function getWelcome(): Response
    {
        return $this->render('welcome.html.twig');

    }

}