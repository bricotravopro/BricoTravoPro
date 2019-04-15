<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CGU extends AbstractController
{
    /**
     * @Route("/CGU", name="CGU")
     * @return Response
     */
    public function CGU()
    {
        return $this->render('documents/cgu.html.twig');
    }
}