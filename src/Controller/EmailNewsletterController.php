<?php


namespace App\Controller;

use App\Entity\EmailNewsletter;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class EmailNewsletterController extends AbstractController
{
    public function EmailNewsletter()
    {
        $emailnewsletter = new EmailNewsletter();
        if ($emailnewsletter->isSubmitted() && $emailnewsletter->isValid()) {

            // Ajouter l'utilisateur en BDD
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($emailnewsletter);
            $manager->flush();
        }
    }
}