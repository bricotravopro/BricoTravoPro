<?php
namespace App\Controller;

use App\Entity\Pro;
use App\Form\RegisterProType;
use App\Service\AppelAPI;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class RegistrationProController extends AbstractController
{
    /**
     * @Route("/inscription/professionnel", name="inscription_professionnel")
     * @param Request $request
     * @return Response
     */
    public function ProRegistration(Request $request, AppelAPI $appelAPI)
    {
        $professionel = new Pro();
        $form = $this->createForm(RegisterProType::class, $professionel);

        $form->handleRequest($request);

        $appelAPI->APISiret($professionel->getNumeroSiret());

        if ($form->isSubmitted() && $form->isValid()) {

            $exists = $appelAPI->APISiret($professionel->getNumeroSiret());

            // Ajouter l'utilisateur en BDD
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($professionel);
            $manager->flush();
        }else{
            $this->addFlash('error', 'Numéro de Siret inconnu');
        }

        return $this->render('registration/ProRegistration.html.twig', [
            'form' => $form->createView()
        ]);
    }

}