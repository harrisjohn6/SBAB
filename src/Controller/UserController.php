<?php


namespace App\Controller;

use App\Entity\user;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class UserController
 * @package App\Controller
 */
class UserController extends AbstractController
{
    /**
     * @Route("/getUser")
     * @return Response
     */
    public function getUser(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $newUser = new user;
        $newUser->setFirstName('Jace');
        $newUser->setLastName('Harris');
        $newUser->setEmailAddress('jace@jgharris.net');
        $newUser->setPassword('jacieP00');
        $newUser->setCreationDate(date('Y-m-d'));

        $em->persist($newUser);
        $em->flush();

        return new Response("The new user id is : " . $newUser->getId());
    }
}