<?php

namespace App\Controller;


use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class LuckyNumberController
{

    /**
     * @return Response
     * @throws Exception
     * @Route("/lucky/number")
     */
    public function number(): Response
    {
        $number = random_int(0, 100);
        return new Response('<html><body> Luck Number : ' . $number . '</body></html>');

    }

}