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

        for ($i = 1; $i <= 10; $i++) {
            $user = new Pro();
            $user->setEntreprise($faker->domainWord($gender = null));
            $user->setPrenom($faker->firstName($gender = null));
            $user->setNom($faker->lastName);
            $user->setAdresse($faker->address);
            $user->setVille($faker->city);
            $user->setCP($faker->randomElement([
                '59000', '59260', '59800', '80000', '75000'
            ]));
            $user->setTelephone($faker->randomElement([
                '0320567876', '0679807969', '0796567969', '0654342334', '0345679203'
            ]));
            $user->setNumeroSiret($faker->randomElement([
                '123456789', '987654321'
            ]));
            $user->setSecteurActivite($faker->randomElement([
                'Maçonnerie', 'Gros oeuvre', 'Couvreur'
            ]));

            $user->setEmail($faker->safeEmail);
            $user->setCGU('1');
            $user->setNewsletter('0');
            $user->setMotDePasse($this->encoder->encodePassword($user, 'demopassword'));
            $user->setEmail($faker->safeEmail);

            $manager->persist($user);
            $users[$i] = $user;
        }



        $manager->flush();
    }
}
