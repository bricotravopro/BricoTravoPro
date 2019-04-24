<?php


namespace App\Controller;

use App\Entity\ContactMail;
use App\Form\ContactMailType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactMailController extends AbstractController
{
    /**
     * @Route("/contact-mail", name="contact")
     * @param Request $request
     * @return Response
     */
    public function ContactMail(Request $request)
    {
        $contactmail = new  ContactMail();
        $form = $this->createForm(ContactMailType::class, $contactmail);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Ajouter du message en BDD
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($contactmail);
            $manager->flush();
        }

        return $this->render('contact/contact-mail.html.twig', [
            'form'=> $form->createView()
        ]);
    }
}