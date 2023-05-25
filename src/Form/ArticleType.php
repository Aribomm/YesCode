<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Url;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre de l\'article',
                'attr' => ['placeholder' => 'Votre titre ici...'],
                'constraints' => [
                    new NotBlank(['message' => 'Le titre ne peut pas être vide.']),
                    new Length([
                        'min' => 5,
                        'max' => 255,
                        'minMessage' => 'Le titre doit contenir au moins {{ limit }} caractères.',
                        'maxMessage' => 'Le titre ne peut pas dépasser {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('intro', TextType::class, [
                'label' => 'Introduction de votre article',
                'attr' => ['placeholder' => 'Une intro accrocheuse...'],
                'constraints' => [
                    new NotBlank(['message' => 'L\'introduction ne peut pas être vide.']),
                    new Length([
                        'min' => 20,
                        'max' => 255,
                        'minMessage' => 'L\'introduction doit contenir au moins {{ limit }} caractères.',
                        'maxMessage' => 'L\'introduction ne peut pas dépasser {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu de votre article',
                'attr' => ['placeholder' => 'Ici un roman...lachez-vous...'],
                'constraints' => [
                    new NotBlank(['message' => 'Le contenu ne peut pas être vide.']),
                ],
            ])
            ->add('image', TextType::class, [
                'label' => 'URL (adresse de l\'image)',
                'attr' => ['placeholder' => 'https://....'],
                'constraints' => [
                    new Url(['message' => 'Ce n\'est pas une URL valide.']),
                ],
            ])
            ->add('Envoyer', SubmitType::class);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
