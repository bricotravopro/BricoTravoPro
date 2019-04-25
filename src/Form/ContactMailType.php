<?php

namespace App\Form;

use App\Entity\ContactMail;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactMailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom', TextType::class, array('label'=>false, 'attr'=>array('placeholder'=>'Saisissez ici votre Nom (requis)')))
            ->add('Prenom', TextType::class, array('label'=>false, 'attr'=>array('placeholder'=>'Saisissez ici votre Prénom')))
            ->add('Email', EmailType::class, array('label'=>false, 'attr'=>array('placeholder'=>'Saisissez ici votre e-mail (requis)')))
            ->add('Sujet', ChoiceType::class, [
                'choices'  => [
                    'Choisissez votre sujet' => 'Choisissez votre sujet',
                    'Demande d\'informations' => 'Demande d\'informations',
                    'Demande de partenariat' => 'Demande de partenariat' ,
                    'Demande d\'entretien téléphonique' => 'Demande d\'entretien téléphonique',
                    'Autre' => 'Autre']
                ])
            ->add('Message', TextareaType::class, array('attr'=>array('placeholder'=>'La parole est à vous ...')))
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' =>ContactMail::class,
        ]);
    }
}