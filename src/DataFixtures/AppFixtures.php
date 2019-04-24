<?php

namespace App\DataFixtures;

use App\Entity\Particulier;
use App\Entity\Pro;
use App\Entity\User;
use App\Entity\Avis;
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
        for ($i = 1; $i <= 10; $i++) {
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
            $user->setEmail($faker->safeEmail);

            $manager->persist($user);
            $users[$i] = $user;
        }
        // Création des pros
        $pros = []; // Le tableau nous aide à retrouver les professionnels
        for ($i = 1; $i <= 200; $i++) {
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
        
        //  // Création des Avis
        //  for ($i = 1; $i <= 10; $i++) {
        //      $avis = new Avis();
        //      $avis->setId_Pro($pro[rand(1, 10)]);
        //      $avis->setEmail($pro->getEmail());
        //      $avis->setNote(rand(0, 5));
        //      $avis->setCommentaire($faker->text);
        //      $avis->setDate($faker->dateTime());
        //      $avis->setId_Particulier($user[rand(1, 10)]);	 
        //  }

        //  // Création des ContactPro
        // for ($i = 1; $i <= 20; $i++) {
        //     $contact_pro = new ContactPro();
        //     $contact_pro->setID_Pro($pro[rand(1, 10)]);
        //     $contact_pro->setDate($faker->dateTime());
        //     $contact_pro->setMessage($faker->text);
        //     $contact_pro->setSujet($nbWords = 5, $variableNbWords = true);
        // }
        // // Création des ContactParticulier
        // for ($i = 1; $i <= 20; $i++) {
        //     $contact_particulier = new ContactParticulier();
        //     $contact_particulier->setID_Particulier($particulier[rand(1, 10)]);
        //     $contact_particulier->setDate($faker->dateTime());
        //     $contact_particulier->setMessage($faker->text);
        //     $contact_particulier->setSujet($nbWords = 5, $variableNbWords = true);
        // }


        $manager->flush();
    }
}    