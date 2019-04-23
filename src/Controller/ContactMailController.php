<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ContactMailController
{
    /**
     * @Route("/contact-mail", name="contact-mail")
     * @return Response
     */
    public function contact()
    {
        return $this->render('contact/contact-mail.html.twig');
    }
}