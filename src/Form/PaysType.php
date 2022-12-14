<?php

namespace App\Form;

use App\Entity\Pays;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaysType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomPays', TextType::class, [
                'required' => true,
                'label' => 'nom.pays',
                'attr' => [
                    'placeholder' => 'nom.pays',
                ],
                'row_attr' => [
                    'class' => 'form-floating',
                ],])
            ->add('idContinent', null, [
                'required' => true,
                'label' => 'nom.continent',
                'query_builder' => function(EntityRepository $repository) { 
                    return $repository->createQueryBuilder('nameContinent')->orderBy('nameContinent.nomContinent', 'ASC');},
                'attr' => [
                    'placeholder' => 'nom.continent',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pays::class,
        ]);
    }
}
