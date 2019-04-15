<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ProfessionnelController
{
    /**
     * @Route("/", name="professionnel")
     */
    public function index()
    {
        return $this->render('professionnels/professionnels.html.twig');
    }
}