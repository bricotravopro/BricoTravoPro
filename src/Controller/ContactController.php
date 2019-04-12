<?php

namespace App\Controller;

use App\Entity\ContactParticulier;
use App\Form\ContactParticulierType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact/particulier", name="contact_particulier")
     * @param Request $request
     * @return Response
     */
    public function UserRegistration(Request $request)
    {
        $contactparticulier = new ContactParticulier();
        $form = $this->createForm(ContactParticulierType::class, $contactparticulier);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactparticulier->setDate(new \DateTime('now'));
            // Ajouter du message en BDD
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($contactparticulier);
            $manager->flush();
        }

        return $this->render('contact/contactparticulier.html.twig', [
            'form' => $form->createView()
        ]);
}
}
