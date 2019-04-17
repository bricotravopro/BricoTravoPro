<?php

namespace App\Controller;

use App\Entity\Particulier;
use App\Entity\Pro;
use App\Repository\ParticulierRepository;
use App\Repository\ProRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    //ToDO : Page accessible que pour les Admins
     /**
     * @Route("/list/particuliers", name="particulier_list")
     * @param ParticulierRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listparticulier(ParticulierRepository $repository)
    {
        $particuliers = $repository->findAll();

        return $this->render('list/particuliers.html.twig', [
            'particuliers' => $particuliers
        ]);
    }

    //ToDO : Page accessible que pour les Admins
    /**
     * @Route("/list/pros", name="pro_list")
     * @param ProRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listpro(ProRepository $repository)
    {
        $professionnels = $repository->findAll();

        return $this->render('list/professionnels.html.twig', [
            'professionnels' => $professionnels
        ]);
    }

    /**
     * @Route("/delete/particulier/{id}", name="particulier_delete", methods={"POST"})
     * @param Request $request
     * @param Particulier $pro
     * @return RedirectResponse
     */

    public function deleteparticulier(Particulier $particulier, Request $request)
    {
        if (!$this->isCsrfTokenValid('delete', $request->get('token'))) {
            return $this->redirectToRoute('particulier_list');
        }

        // $em = $entityManager
        $em = $this->getDoctrine()->getManager();
        $em->remove($particulier);
        $em->flush();

        return $this->redirectToRoute('particulier_list');
    }


/**
     * @Route("/delete/pro/{id}", name="pro_delete", methods={"POST"})
     * @param Request $request
     * @param Pro $pro
     * @return RedirectResponse
     */

    public function deletepro( Pro $pro, Request $request)
    {
        if (!$this->isCsrfTokenValid('delete', $request->get('token'))) {
            return $this->redirectToRoute('pro_list');
        }

        // $em = $entityManager
        $em = $this->getDoctrine()->getManager();
        $em->remove($pro);
        $em->flush();

        return $this->redirectToRoute('pro_list');
    }
}

