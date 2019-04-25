<?php

namespace App\Controller;

use App\Form\RegisterType;
use App\Form\RegisterProType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

class AccountController extends AbstractController
{
   
    /* **************
    **
    **  Section infos Particuliers
    **
    ************** */

    /**
    * @Route("/settings", name="user_infos")
    * @param Request $request
    * @return Response
    */
    public function UserSettings(Request $request, Security $security)
    {
        $user = $security->getUser();
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Màj l'utilisateur dans la BDD
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($user);
            $manager->flush();
        }

        return $this->render('particuliers\account_infos.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /* **************
    **
    **  Section Professionnels :
    **
    ************** */
    /**
    * @Route("/settings/pro", name="pro_infos")
    * @param Request $request
    * @return Response
    */
    public function ProSettings(Request $request, Security $security)
    {
        $pro = $security->getUser();
        $form = $this->createForm(RegisterProType::class, $pro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager = $this->getDoctrine()->getManager();

            $manager->persist($pro);
            $manager->flush();
        }

        return $this->render('professionnels\account_infos.html.twig', [
            'form' => $form->createView()
        ]);
    }

}


