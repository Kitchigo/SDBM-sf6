<?php

namespace App\Form;

use App\Entity\Continent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContinentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomContinent', TextType::class, [
                'required' => true,
                'label' => 'nom.continent',
                'attr' => [
                    'placeholder' => 'nom.continent',
                ],
                'row_attr' => [
                    'class' => 'form-floating',
                ],])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Continent::class,
        ]);
    }
}
