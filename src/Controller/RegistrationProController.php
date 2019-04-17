<?php
namespace App\Controller;

use App\Entity\Pro;
use App\Form\RegisterProType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class RegistrationProController extends AbstractController
{
    /**
     * @Route("/inscription/professionnel", name="inscription_professionnel")
     * @param Request $request
     * @return Response
     */
    public function ProRegistration(Request $request)
    {
        $professionel = new Pro();
        $form = $this->createForm(RegisterProType::class, $professionel);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Ajouter l'utilisateur en BDD
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($professionel);
            $manager->flush();
        }

        return $this->render('registration/ProRegistration.html.twig', [
            'form' => $form->createView()
        ]);
    }

}