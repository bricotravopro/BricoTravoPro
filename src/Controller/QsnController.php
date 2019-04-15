<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class QsnController extends AbstractController
{
    /**
     * @Route("/qsn", name="qsn")
     * @return Response
     */
    public function Qsn()
    {
        return $this->render('documents/qsn.html.twig');
    }
}