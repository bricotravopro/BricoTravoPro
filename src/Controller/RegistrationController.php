<?php

namespace App\Controller;

use App\Entity\Particulier;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @Route("/inscription/particulier", name="inscription_particulier")
     * @param Request $request
     * @return Response
     */
    public function UserRegistration(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $particulier = new Particulier();
        $form = $this->createForm(RegisterType::class, $particulier);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $particulier->setMotDePasse($encoder->encodePassword($particulier, $particulier->getMotDePasse() ));

            // Ajouter l'utilisateur en BDD
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($particulier);
            $manager->flush();

            // Redirige l'utilisateur vers la page home
            // TODO: Changer le système d'id quand on aura un système de connexion
            return $this->redirectToRoute('home', [
                'id' => $particulier ->getId()
            ]);
        }

        return $this->render('registration/UserRegistration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}