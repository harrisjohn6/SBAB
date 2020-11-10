<?php


namespace App\Controller;


use App\Entity\Users;
use DateTime;
use Symfony\Bridge\Monolog\Logger;
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
     * @Route("/Index", methods={"POST"})
     * @return Response
     */
    public function postLogin(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $usersRepository = $em->getRepository(Users::class);
        $postPassword = $_POST['password'];
        $postEmailAddress = $_POST['emailAddress'];

        $foundUser = $usersRepository->findOneBy(['emailAddress' => $postEmailAddress]);

        if ($foundUser == null) {

            return $this->render('index.html.twig');

        } else {
            $foundUserEmail = $foundUser->getEmailAddress();
            $foundUserPassword = $foundUser->getPassword();

            if ($foundUserEmail == $postEmailAddress && $foundUserPassword == $postPassword) {
                $foundUser->setBadLoginCount(0);
                $foundUser->setLastLoginDate(DateTime::createFromFormat('Y-m-d', date('Y-m-d')));
                $em->persist($foundUser);
                $em->flush();

                return $this->redirect('/welcome');

            } elseif ($foundUser == $postEmailAddress && $foundUserPassword != $postPassword) {
                $oldBadLoginCount = $foundUser->getBadLoginCount();
                $newBadLoginCount = $oldBadLoginCount + 1;
                Logger::DEBUG('Bad Login Count should be set to : ' . $newBadLoginCount);
                $foundUser->setBadLoginCount($newBadLoginCount);
                $em->persist($foundUser);
                $em->flush();
            }
        }
        return $this->redirect('/Index');
    }
}