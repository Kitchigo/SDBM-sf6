<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void 
    {
        $builder
            ->add('annee', IntegerType::class, [
                'required' => true,
                'label' => 'annee.form',
                'attr' => [
                    'placeholder' => 'annee.form',
                    // 'readonly' => true,
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],])
            ->add('numeroTicket', IntegerType::class, [
                'required' => true,
                'label' => 'numero.ticket',
                'attr' => [
                    'placeholder' => 'numero.ticket',
                    // 'readonly' => true,
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],])
            ->add('dateVente',DateTimeType::class, [
                'required' => true,
                'label' => 'date.vente',
                'row_attr' => [
                'class' => 'text-white my-3',
                // 'disabled' => true,

            ],         
        
            ])
            // ->add('idArticle')

        ;
    }
    // 'placeholder' => ['day' => 'Jour', 'month' => 'Mois', 'year' => 'Année', 'hour' => 'Heure', 'minute' => 'Minute', 'second' => 'Seconde'],
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
