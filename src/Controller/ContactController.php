<?php

namespace App\Controller;

use App\Entity\ContactParticulier;
use App\Entity\ContactPro;
use App\Form\ContactParticulierType;
use App\Form\ContactProType;
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
    public function ContactParticulier(Request $request)
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

    /**
     * @Route("/contact/pro", name="contact_pro")
     * @param Request $request
     * @return Response
     */
    public function ContactPro(Request $request)
    {
        $contactpro = new ContactPro();
        $form = $this->createForm(ContactProType::class, $contactpro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactpro->setDate(new \DateTime('now'));
            // Ajouter du message en BDD
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($contactpro);
            $manager->flush();
        }

        return $this->render('contact/contactpro.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/contact-mail", name="contact")
     * @param Request $request
     * @return Response
     */
    public function Contact(Request $request)
    {
        return $this->render('contact/contact-mail.html.twig',
    }
}
