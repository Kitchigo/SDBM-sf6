<?php

namespace App\Form;

use App\Entity\Couleur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CouleurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomCouleur', TextType::class, [
                'required' => true,
                'label' => 'Nom Couleur :',
                'attr' => [
                    'placeholder' => 'Nom Couleur',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Couleur::class,
        ]);
    }
}
