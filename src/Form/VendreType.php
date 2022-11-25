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
                'label' => 'annee.form',
                'attr' => [
                    'placeholder' => 'annee.form',
                    'readonly' =>'true',
                ],
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],
            ])
            ->add('numeroTicket', IntegerType::class,[
                'required' => true,
                'label' => 'numero.ticket',
                'attr' => [
                    'placeholder' => 'numero.ticket',
                    'readonly' =>'true',
                ],
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],
            ])
            ->add('idArticle', null,[
                'required' => true,
                'label' => 'nom.article',
                'attr' => [
                    'placeholder' => 'nom.article',
                ],
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],
            ])
            ->add('prixVente',NumberType::class, [
                'required' => true,
                'label' => 'prix.vente',
                'attr' => [
                    'placeholder' => 'prix.vente',
                ],
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],
            ])
            ->add('quantite',IntegerType::class, [
                'required' => true,
                'label' => 'quantite.form',
                'attr' => [
                    'placeholder' => 'quantite.form',
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
