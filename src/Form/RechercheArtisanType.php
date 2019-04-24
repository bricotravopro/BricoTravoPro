<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class RechercheArtisanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('SecteurActivite', ChoiceType::class, [
                'choices' => [
                    'Plomberie' => 'Plomberie',
                    'Charpente' => 'Charpente',
                    'Couvreur/Toiture' => 'Couvreur/Toiture',
                    'Electricité' => 'Electricité',
                    'Espaces Verts' => 'Espaces Verts',
                    'Maçonnerie' => 'Maçonnerie',
                    'Peinture' => 'Peinture',
                    'Revêtements et sols' => 'Revêtements et sols',
                    'Menuiserie' => 'Menuiserie',
                ]])
            ->add('Ville');
    }
}