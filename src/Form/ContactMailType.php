<?php

namespace App\Form;

use App\Entity\ContactMail;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactMailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Prenom')
            ->add('Email')
            ->add('Sujet', ChoiceType::class, [
                'choices'  => [
                    'Demande d\'informations' => 'Demande d\'informations',
                    'Demande de partenariat' => 'Demande de partenariat' ,
                    'Demande d\'entretien téléphonique' => 'Demande d\'entretien téléphonique',
                    'Autre' => 'Autre']
                ])
            ->add('Message', TextareaType::class)
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' =>ContactMail::class,
        ]);
    }
}