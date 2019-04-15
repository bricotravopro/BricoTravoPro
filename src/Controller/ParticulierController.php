<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ParticulierController
{
    /**
     * @Route("/", name="particulier")
     */
    public function index()
    {

        return $this->render('particuliers/particuliers.html.twig');
    }
}