<?php


namespace App\Controller;


use App\Entity\Users;
use App\Form\LoginFormType;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", methods={"GET"})
     */
    public function getIndex()
    {
        $user = new Users();
        $form = $this->createForm(LoginFormType::class, $user);

        return $this->render('index.html.twig', ['loginForm' => $form->createView()]);
    }

    public function login(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new Users();
        $form = $this->createForm(LoginFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formPassword = $request->getForm($form)->get('password');
            $formEmailAddress = $request->getForm($form)->get('emailAddress');
       
        }
    }


}