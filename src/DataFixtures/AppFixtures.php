<?php

namespace App\DataFixtures;

use App\Entity\Particulier;
use App\Entity\Pro;
use App\Entity\User;
use App\Entity\Avis;
use App\Entity\ContactPro;
use App\Entity\ContactParticulier;
use App\Entity\SecteurActivite;
use App\Entity\ContactMail;
use App\Entity\EmailNewsletter;
use Cocur\Slugify\SlugifyInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /**
     * @var SlugifyInterface
     * @var UserPasswordEncoderInterface
     */
    private $slugify;
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder,SlugifyInterface $slugify)
    {
        $this->slugify = $slugify;
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        // Création des users
        $users = []; // Le tableau nous aide à retrouver les utilisateurs
        for ($i = 0; $i < 10; $i++) {
            $user = new Particulier();
            $user->setPrenom($faker->firstName($gender = null));
            $user->setNom($faker->lastName);
            $user->setAdresse($faker->address);
            $user->setVille($faker->city);
            $user->setCP($faker->randomElement([
                '59000', '59260', '59800', '80000', '75000'
            ]));
            $user->setEmail($faker->safeEmail);
            $user->setMotDePasse($this->encoder->encodePassword($user, 'demopassword'));

            $manager->persist($user);
            $users[$i] = $user;
        }

        // Création des pros
        $pros = []; // Le tableau nous aide à retrouver les professionnels
        for ($i = 0; $i < 10; $i++) {
            $pro = new Pro();
            $pro->setEntreprise($faker->domainWord($gender = null));
            $pro->setPrenom($faker->firstName($gender = null));
            $pro->setNom($faker->lastName);
            $pro->setAdresse($faker->address);
            $pro->setVille($faker->randomElement([
                'Lille', 'Marcq-en-Baroeul','La Madeleine', 'Lomme', 'Dunkerque', 'Arras', 'Lens','Amiens','Bethunes','St-Omer','Maubeuge', 'Valenciennes','Douais'
            ]));
            $pro->setCP($faker->randomElement([
                '59000', '59260', '59800', '80000', '75000'
            ]));
            $pro->setTelephone($faker->randomElement([
                '0320567876', '0679807969', '0796567969', '0654342334', '0345679203'
            ]));
            $pro->setNumeroSiret($faker->randomElement([
                '123456789', '987654321'
            ]));
            $pro->setSecteurActivite($faker->randomElement([
                'Plomberie', 'Charpente', 'Chauffage', 'Couvreur/Toiture', 'Electricité', 'Espaces Verts', 'Maçonnerie', 'Peinture', 'Revêtements et sols', 'Menuiserie'
            ]));

            $pro->setEmail($faker->safeEmail);
            $pro->setCGU('1');
            $pro->setNewsletter('0');
            $pro->setMotDePasse($this->encoder->encodePassword($pro, 'demopassword'));
            $pro->setEmail($faker->safeEmail);

            $manager->persist($pro);
            $pros[$i] = $pro;
        }
        
        $manager->flush();
        

         // Création des Avis
        $pro_user_indices = [];      //  Tableau de tout les couples possibles
        for ($i = 0; $i < count($pros); $i++) {
            for ($j = 0; $j < count($users); $j++) {
                $pro_user_indices[] = [$i, $j];
            }
        }
        for ($i = 0; $i < 30; $i++) {
             $avis = new Avis();
             //  Pour ne pas se retrouver avec deux couples identiques
             $indices = array_splice ( $pro_user_indices , rand(0, count($pro_user_indices) - 1), 1) [0];
             $user= $users[$indices[1]];
             $avis->setIdPro($pros[$indices[0]]);
             $avis->setEmail($user->getEmail());
             $avis->setNote(rand(0, 5));
             $avis->setCommentaire($faker->text);
             $avis->setDate($faker->dateTime());
             $avis->setIdParticulier($user);
             $manager->persist($avis);	 
         }

         // Création des ContactPro
        for ($i = 0; $i < 10; $i++) {
            $contact_pro = new ContactPro();
            $contact_pro->setIDPro($pros[rand(0, 9)]->getId());
            $contact_pro->setDate($faker->dateTime());
            $contact_pro->setMessage($faker->text);
            $contact_pro->setSujet($nbWords = 5, $variableNbWords = true);
            $manager->persist($contact_pro);
        }
        // Création des ContactParticulier
        for ($i = 0; $i < 10; $i++) {
            $contact_particulier = new ContactParticulier();
            $contact_particulier->setIDParticulier($users[rand(0, 9)]->getId());
            $contact_particulier->setDate($faker->dateTime());
            $contact_particulier->setMessage($faker->text);
            $contact_particulier->setSujet($nbWords = 5, $variableNbWords = true);
            $manager->persist($contact_particulier);
        }
        // Création des SecteurActivites
        $secteuractivites = ['Plomberie ','Charpente ','Chauffage ','Couverture / Toiture','Electricité','Espaces Verts','Maçonnerie / Gros oeuvre','Peinture','Revêtements et sols','Menuiserie  PVC...)'];
        for ($i = 0; $i < 9; $i++) {
            $secteuractivite = new SecteurActivite();
            $secteuractivite->setNom($secteuractivites[$i]);
            $secteuractivite->setDescription($faker->text);
            $manager->persist($secteuractivite);
        }
        // Création des EmailNewsletter
        $email_newsletters = []; 
        for ($i = 0; $i < 20; $i++) {
            $email_newsletter = new EmailNewsletter();
            $email_newsletter->setEmail($faker->safeEmail);
            $manager->persist($email_newsletter);
        }        
        // Création des ContactMail
        for ($i = 0; $i < 10; $i++) {
            $contact_mail = new ContactMail();
            $contact_mail->setNom($faker->lastName);
            $contact_mail->setPrenom($faker->firstName($gender = null));
            $contact_mail->setEmail($faker->safeEmail);
            $contact_mail->setSujet($nbWords = 4, $variableNbWords = true);
            $contact_mail->setMessage($faker->text);
            $manager->persist($contact_mail);
        }

        $manager->flush();
    }
}    