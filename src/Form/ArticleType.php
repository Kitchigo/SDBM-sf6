<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
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
                'label' => 'Nom de l\'article :',
                'attr' => [
                    'placeholder' => 'Nom de l\'article',
                ],
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],])
            ->add('prixAchat', TextType::class, [
                'required' => true,
                'label' => 'Prix d\'achat :',
                'attr' => [
                    'placeholder' => 'Prix d\'achat',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],])
            ->add('volume', TextType::class, [
                'required' => true,
                'label' => 'Volume :',
                'attr' => [
                    'placeholder' => 'Volume',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],])
            ->add('titrage', TextType::class, [
                'required' => true,
                'label' => 'Titrage :',
                'attr' => [
                    'placeholder' => 'Titrage',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],])
            ->add('idMarque', null, [
                'required' => false,
                'label' => 'Nom de la marque :',
                'attr' => [
                    'placeholder' => 'Nom de la marque',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],])
            ->add('idType', null, [
                'required' => false,
                'label' => 'Type de bière :',
                'attr' => [
                    'placeholder' => 'Type de bière',
                ],
                'row_attr' => [
                    'class' => 'form-floating my-3',
                ],])
            ->add('idCouleur', null, [
                'required' => false,
                'label' => 'Couleur :',
                'attr' => [
                    'placeholder' => 'Couleur',
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
