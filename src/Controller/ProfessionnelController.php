<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class ProfessionnelController extends AbstractController
{
    /**
     * @Route("/", name="professionnel")
     * @return Response
     */
    public function index()
    {
        return $this->render('professionnels/professionnels.html.twig');
    }
}