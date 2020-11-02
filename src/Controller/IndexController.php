<?php


namespace App\Controller;


use App\Form\RegistrationForm;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @return Response
     * @Route("/Index", methods={"GET"})
     */
    public function getIndex(): Response
    {
        return $this->render('index.html.twig');
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/Index", methods={"POST"})
     */
    public function userLogin(Request $request): Response
    {
        if ($request->getType() == 'POST') {
            $emailAddress = $request['emailAddress'];
            $password = $request['password'];

            $response = null;

            return $this->render('index.html.twig', $response);
        } else {
            echo 'There is an error!';
        }

        return $this->render('index.html.twig', $response);

    }

}