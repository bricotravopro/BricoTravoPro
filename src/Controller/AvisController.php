<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Entity\Pro;
use App\Entity\Particulier;
use App\Repository\AvisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    /**
     * @Route("/avis/pro/{id}", name="avis_pro")
     * @param Pro $pro
     * @return Response
     */
    public function avisPro(Avis $avis, Pro $pro) {
        return $this->render('professionnels/avis_pro.html.twig', [
            'pro' => $pro
        ]);
    }
    
    /**
     * @Route("/avis/particulier/{id}", name="avis_particulier")
     * @param Particulier $particulier
     * @return Response
     */
    public function avisParticulier(Avis $avis, Particulier $particulier) {
        return $this->render('particuliers/avis_particulier.html.twig', [
            'particulier' => $particulier
        ]);
    }
}
