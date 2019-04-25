<?php

namespace App\Form;

use App\Entity\EmailNewsletter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmailNewsletterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('email',EmailType::class, array('label' => false, 'attr' => array(
        'placeholder' => 'Saisissez ici votre adresse e-mail...',
    ))
)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EmailNewsletter::class,
        ]);
    }
}