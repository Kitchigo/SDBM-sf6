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
                'label' => 'Nom Marque :',
                'attr' => [
                    'placeholder' => 'Nom Marque',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],
            ])
            ->add('idFabricant', null, [
                'required' => true,
                'label' => 'Fabricant :',
                'attr' => [
                    'placeholder' => 'Fabricant ',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],
            ])
            ->add('idPays', null, [
                'required' => true,
                'label' => 'Pays :',
                'attr' => [
                    'placeholder' => 'Pays ',
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
