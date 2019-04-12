<?php

namespace App\Controller;

use App\Entity\Particulier;
use App\Entity\Pro;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class AccountController extends AbstractController
{
    /* **************
    **
    **  Section infos personnelles:
    **
    ************** */

    // Section infos personnel


    /**
     * @Route("/particulier/{id}", name="particulier_account")
     */
    public function account($id)
    {
        $particulier = $this->getDoctrine()
        	->getRepository(Particulier::class)
        	->find($id);

        if (!$particulier) {
            throw $this->createNotFoundException( 'L\'utlisateur' . $id . ' n\'existe pas.' );
        }
    }

     /**
     * @Route("/account", name="account")
     */
    public function index()
    {
        return $this->render('account/account_infos.html.twig', [
            'controller_name' => 'AccountController',
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

