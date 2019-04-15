<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MentionsLegalesController extends AbstractController
{
    /**
     * @Route("/MentionsLegales", name="mentions_legales")
     * @return Response
     */
    public function MentionsLegales()
    {
        return $this->render('documents/MentionsLegales.html.twig');
    }
}