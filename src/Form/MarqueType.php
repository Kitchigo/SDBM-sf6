<?php

namespace App\Form;

use App\Entity\Marque;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MarqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomMarque', TextType::class, [
                'required' => true,
                'label' => 'nom.marque',
                'attr' => [
                    'placeholder' => 'nom.marque',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],
            ])
            ->add('idFabricant', null, [
                'required' => true,
                'label' => 'nom.fabricant',
                'attr' => [
                    'placeholder' => 'nom.fabricant',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],
            ])
            ->add('idPays', null, [
                'required' => true,
                'label' => 'nom.pays',
                'attr' => [
                    'placeholder' => 'nom.pays',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Marque::class,
        ]);
    }
}
