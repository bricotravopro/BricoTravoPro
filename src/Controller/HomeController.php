<?php

namespace App\Controller;

use App\Entity\EmailNewsletter;
use App\Form\EmailNewsletterType;
use App\Form\RechercheArtisanType;
use App\Repository\ProRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, ProRepository $ProRepository)
    {
        $newsletterform = new EmailNewsletter();
        $form = $this->createForm(EmailNewsletterType::class, $newsletterform);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($newsletterform);
            $manager->flush();
            // Message Flashbag réussite
            $this->addFlash('success', 'E-mail enregistré');
        }

        $rechercheArtisanForm = $this->createForm(RechercheArtisanType::class);

        $artisans = null;
        if($rechercheArtisanForm->handleRequest($request)->isSubmitted() && $rechercheArtisanForm->isValid()) {
            $criteres = $rechercheArtisanForm->getData();
            $artisans = $ProRepository->rechercheArtisan($criteres);
            dump($artisans);
        }
        return $this->render('home/index.html.twig',[
            'form_newsletter'=> $form->createView(),
            'search_form'=> $rechercheArtisanForm->createView(),
            'artisans' => $artisans
        ]);
    }

}