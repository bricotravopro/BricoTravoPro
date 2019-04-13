<?php
namespace App\Form;


use App\Entity\Pro;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterProType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Entreprise')
            ->add('SecteurActivite')
            ->add('NumeroSiret')
            ->add('Nom')
            ->add('Prenom')
            ->add('Adresse')
            ->add('CP')
            ->add('Telephone', TelType::class)
            ->add('Logo')
            ->add('Email', EmailType::class)
            ->add('MotDePasse')
            ->add('SiteWeb')
            ->add('PageFacebook')
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pro::class,
        ]);
    }

}
