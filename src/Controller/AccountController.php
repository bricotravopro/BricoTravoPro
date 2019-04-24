<?php

namespace App\Controller;

use App\Entity\Particulier;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AccountController extends AbstractController
{
    /* **************
    **
    **  Section infos personnelles:
    **
    ************** */

    // Section infos personnel

    /**
    * @Route("/settings/{id}", name="user_infos")
    * @param Request $request
    * @return Response
    */
    public function UserSettings(Request $request, Particulier $user)
    {
        $form = $this->createForm(RegisterType::class, $user);
        // TODO: Changer l'url {id} quand on aura un système de connexion

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
}


