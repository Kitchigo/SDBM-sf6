<?php

namespace App\Form;

use App\Entity\Fabricant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FabricantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomFabricant', TextType::class, [
                'required' => true,
                'label' => 'Nom Fabricant :',
                'attr' => [
                    'placeholder' => 'Nom Fabricant',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fabricant::class,
        ]);
    }
}
