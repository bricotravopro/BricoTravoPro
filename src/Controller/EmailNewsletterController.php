<?php

namespace App\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\EmailNewsletter;

class EmailNewsletterController extends AbstractController{
    public function insererNewsletter(Request $request, ObjectManager $mailounet){

        $newsletter = new EmailNewsletter();

        $form_newsletter = $this->createFormBuilder ($newsletter)
            ->add('email')
            ->getForm();

        $form_newsletter->handleRequest($request);
        if($form_newsletter->isSubmitted()){
            if($form_newsletter->isValid()){
                $mailounet->persiste($newsletter);
                $mailounet->flush();

                return $this->redirectionToRoute('home/index.html.twig');
            }

            // Envoi d'un flash message
            $this->addFlash(
                'notice',
                'Votre e-mail est bien enregistré !'
            );

            // Renvoi sur la page précédente
            return $this->redirect($request->getReferer());
        }

        return $this->render('CallToAction/cta-newsletter.html.twig',[
            'form'=>$form_newsletter->createView()
        ]);
    }
}
