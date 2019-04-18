<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class FaqController extends AbstractController
{
    /**
     * @Route("/faq", name="faq")
     * @return Response
     */
    public function index()
    {

        return $this->render('faq/faq.html.twig');
    }
}