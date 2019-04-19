<?php


namespace App\Controller;


use App\Entity\SecteurActivite;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecteurActiviteController extends AbstractController
{
//    fonction pour afficher les secteurs d'activités sur la page d'acceuil

    public function showAllActivite(){
        $entityManager = $this->getDoctrine()->getManager();
        $activites = $entityManager->getRepository(SecteurActivite::class)->findAll();

        return $this->render('Search/liste.html.twig',[
            'activites'=> $activites
        ]);
    }

//    fonction pour afficher la page correspondante au secteur d'activité selectionné (clic)
    /**
     * @Route("/secteuractivité/{id}", name="SecteurActivite")
     * @return Response
     */
    public function pageActivite($id)
    {
        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository(SecteurActivite::class)->find($id);

        return $this->render('Search/SecteurActivite.html.twig',[
            'activite'=> $activite,
        ]);
    }

}