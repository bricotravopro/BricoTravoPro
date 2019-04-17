<?php


namespace App\Controller;


use App\Repository\SecteurActiviteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecteurActiviteController extends AbstractController
{
    /**
     * @Route("/secteuractivité", name="SecteurActivite")
     * @return Response
     */
    public function SecteurActivite(SecteurActiviteRepository $repository)
    {
        $SecteurActivite = $repository->findAll();

        return $this->render('Search/SecteurActivite.html.twig');
    }

}