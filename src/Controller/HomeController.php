<?php

namespace App\Controller;


use App\Entity\EmailNewsletter;
use App\Form\NewsletterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request)
    {
        $emailnewsletter= new EmailNewsletter();
        $form = $this->createForm(NewsletterType::class, $emailnewsletter);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Ajouter du message en BDD
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($emailnewsletter);
            $manager->flush();
        }
        return $this->render('home/index.html.twig',
            ['form' =>$form->createView()]);
    }



}