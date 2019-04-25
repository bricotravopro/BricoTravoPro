<?php

namespace App\Controller;

use App\Entity\Particulier;
use App\Entity\Pro;
use App\Form\RegisterType;
use App\Form\RegisterProType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AccountController extends AbstractController
{
   
    /* **************
    **
    **  Section infos Particuliers
    **
    ************** */

    /**
    * @Route("/settings/{id}", name="user_infos")
    * @param Request $request
    * @return Response
    */
    public function UserSettings(Request $request, Particulier $user)
    {
        $form = $this->createForm(RegisterType::class, $user);
        // TODO: Changer l'url {id} quand on aura un système de Slug

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Màj l'utilisateur dans la BDD
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($user);
            $manager->flush();
        }

        return $this->render('particuliers\account_infos.html.twig', [
            'form' => $form->createView(),
            'user' => $user
        ]);
    }

    /* **************
    **
    **  Section Professionnels :
    **
    ************** */
 /**
    * @Route("/settings/{id}", name="pro_infos")
    * @param Request $request
    * @return Response
    */
    public function ProSettings(Request $request, Pro $pro)
    {
        $form = $this->createForm(RegisterProType::class, $pro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager = $this->getDoctrine()->getManager();

            $manager->persist($pro);
            $manager->flush();
        }

        return $this->render('professionnels\account_infos.html.twig', [
            'form' => $form->createView(),
            'pro' => $pro
        ]);
    }

}


