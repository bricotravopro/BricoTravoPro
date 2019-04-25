<?php
namespace App\Controller;

use App\Entity\Pro;
use App\Form\RegisterProType;
use App\Service\AppelAPI;
use GuzzleHttp\Exception\GuzzleException;
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
     * @throws GuzzleException
     */
    public function ProRegistration(Request $request, AppelAPI $appelAPI)
    {
        $professionel = new Pro();
        $form = $this->createForm(RegisterProType::class, $professionel);

//      On controle les données du formulaire
        $form->handleRequest($request);

//      Condition : si le formulaire est soumit et remplit les conditions données
        if ($form->isSubmitted() && $form->isValid()) {

//      On appel l'api qui nous retourne une réponse et on gère l'exception
            try{
                $exists = $appelAPI->APISiret($professionel->getNumeroSiret());
            }catch(\Exception $e){$this->addFlash('danger', 'Numéro de Siret inconnu');
                return $this->redirectToRoute("inscription_professionnel");
            }

//      Si ok on ajoute l'utilisateur en BDD
                $manager = $this->getDoctrine()->getManager();

                $manager->persist($professionel);
                $manager->flush();

//      On redirige sur la page mon compte
            $this->addFlash('success', 'Inscription validée');
                return $this->redirectToRoute("home");
        }

//      On retourne la vue du formulaire
        return $this->render('registration/ProRegistration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}