<?php


namespace App\Controller;

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
    public function Qsn()
    {
        return $this->render('contact/contact-mail.html.twig');
    }
}