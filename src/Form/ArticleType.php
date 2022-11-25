<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomArticle', TextType::class, [
                'required' => true,
                'label' => 'nom.article',
                'attr' => [
                    'placeholder' => 'nom.article',
                ],
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],])
            ->add('prixAchat', NumberType::class, [
                'required' => true,
                'label' => 'prix.achat',
                'attr' => [
                    'placeholder' => 'prix.achat',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],])
            ->add('volume', IntegerType::class, [
                'required' => true,
                'label' => 'volume.form',
                'attr' => [
                    'placeholder' => 'volume.form',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],])
            ->add('titrage', NumberType::class, [
                'required' => true,
                'label' => 'titrage.form',
                'attr' => [
                    'placeholder' => 'titrage.form',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],])
            ->add('idMarque', null, [
                'required' => false,
                'label' => 'nom.marque',
                'attr' => [
                    'placeholder' => 'nom.marque',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],])
            ->add('idType', null, [
                'required' => false,
                'label' => 'type.biere',
                'attr' => [
                    'placeholder' => 'type.biere',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],])
            ->add('idCouleur', null, [
                'required' => false,
                'label' => 'nom.couleur',
                'attr' => [
                    'placeholder' => 'nom.couleur',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],])
            // ->add('annee')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
