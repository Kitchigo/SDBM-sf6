<?php

namespace App\Form;

use App\Entity\Vendre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VendreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('annee', IntegerType::class, [
                'required' => false,
                'label' => 'Année :',
                'attr' => [
                    'placeholder' => 'Année',
                    'readonly' =>'true',
                ],
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],
            ])
            ->add('numeroTicket', IntegerType::class,[
                'required' => true,
                'label' => 'Numéro Ticket :',
                'attr' => [
                    'placeholder' => 'Numéro Ticket',
                    'readonly' =>'true',
                ],
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],
            ])
            ->add('idArticle', null,[
                'required' => true,
                'label' => 'Article :',
                'attr' => [
                    'placeholder' => 'Article',
                ],
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],
            ])
            ->add('prixVente',NumberType::class, [
                'required' => true,
                'label' => 'Prix de Vente :',
                'attr' => [
                    'placeholder' => 'Prix de Vente',
                ],
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],
            ])
            ->add('quantite',IntegerType::class, [
                'required' => true,
                'label' => 'Quantité :',
                'attr' => [
                    'placeholder' => 'Quantité',
                ],
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],
            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vendre::class,
        ]);
    }
}
