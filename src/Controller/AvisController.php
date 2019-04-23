<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    /**
     * @Route("/avis/pro/{id}", name="avis_pro")
     * @param Pro $pro
     * @return Response
     */
    public function avisPro(Pro $pro) {
        return $this->render('account/avis_pro.html.twig', [
            'pro' => $pro
        ]);
    }
    
    /**
     * @Route("/avis/particulier/{id}", name="avis_particulier")
     * @param Particulier $particulier
     * @return Response
     */
    public function avisParticulier(Particulier $particulier) {
        return $this->render('account/avis_particulier.html.twig', [
            'particulier' => $particulier
        ]);
    }
}
