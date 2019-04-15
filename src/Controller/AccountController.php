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
    // TODO: Changer l'url {id} quand on aura un système de connexion
    public function UserSettings(Request $request, Particulier $user)
    {
        $form = $this->createForm(RegisterType::class, $user);

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


        
        // Compte particulier
        // modifier mot de passe
        // modifier mail


/*         public function edit(Request $request, Particulier $particulier)
        {
            if ($account.id->isSubmitted() && $account.id->isValid()) {
                $slug = $slugify->slugify($particulier->getName());
                $particulier->setSlug($slug);
                // Le persist est optionnel
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('success', 'Le produit '.$particulier->getId().' a bien été modifié.');
                return $this->redirectToRoute('particulier_list');
            }
            return $this->render('particulier/edit.html.twig', [
                'particulier' => $particulier,
                'account.id' => $account.id->createView()
            ]);
        }
     */
    
    



        // Compter pro  



}

