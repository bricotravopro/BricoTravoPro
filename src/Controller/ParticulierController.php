<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ParticulierController extends AbstractController
{
    /**
     * @Route("/particulier", name="particulier")
     * @return Response
     */
    public function index()
    {

        return $this->render('particuliers/particuliers.html.twig');
    }
}