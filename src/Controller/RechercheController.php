<?php


namespace App\Controller;


use App\Form\RechercheArtisanType;
use App\Repository\ProRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RechercheController extends AbstractController
{
    /**

     * @Route ("/search", name="search")

     */
    public function RechercheArtisan(Request $request, ProRepository $ProRepository)
    {
        $rechercheArtisanForm = $this->createForm(RechercheArtisanType::class);


        if($rechercheArtisanForm->handleRequest($request)->isSubmitted() && $rechercheArtisanForm->isValid()){
            $criteres = $rechercheArtisanForm->getData();
            $artisans = $ProRepository->rechercheArtisan($criteres);
        dd($artisans);
        }
        return $this->render('home/index.html.twig',[
            'search_form'=> $rechercheArtisanForm->createView(),
            ]);

    }
}