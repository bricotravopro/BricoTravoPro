<?php


namespace App\Controller;


use App\Entity\SecteurActivite;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecteurActiviteController extends AbstractController
{
    /**
     * @Route("/secteuractivité", name="SecteurActivite")
     * @return Response
     */
    public function showAllActivite(){
        $entityManager = $this->getDoctrine()->getManager();
        $activite = $entityManager->getRepository(SecteurActivite::class)->findAll();

// On exécute la requête
        $entityManager->flush();

        return $this->render('Search/SecteurActivite.html.twig',[

        ]);
    }



}