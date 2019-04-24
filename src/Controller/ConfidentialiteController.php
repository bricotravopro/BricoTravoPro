<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class ConfidentialiteController extends AbstractController
{
    /**
     * @Route("/confidentialite", name="confidentialite")
     * @return Response
     */
    public function confidentialite()
    {

        return $this->render('documents/confidentialite.html.twig');
    }
}