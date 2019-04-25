<?php

namespace App\Form;

use App\Entity\Particulier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Prenom')
            ->add('Adresse')
            ->add('CP')
            ->add('Ville')
            ->add('Email', EmailType::class)
            ->add('MotDePasse', PasswordType::class)
            ->add('CGU', CheckboxType::class, [
                'label'    => 'J’ai bien pris connaissance des conditions générales d’utilisation',
                'required' => false,
            ])
            ->add('Newsletter', CheckboxType::class, [
                'label'    => 'J’accepte recevoir des informations via la newsletter',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Particulier::class,
        ]);
    }

}
