<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', null, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Entrez votre prénom',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Le prénom ne peut pas être vide.']),
                    new Length([
                        'min' => 2,
                        'max' => 255,
                        'minMessage' => 'Le prénom doit comporter au moins {{ limit }} caractères.',
                        'maxMessage' => 'Le prénom ne peut pas dépasser {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('lastName', null, [
                'label' => 'Nom de famille',
                'attr' => [
                    'placeholder' => 'Entrez votre nom de famille',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Le nom de famille ne peut pas être vide.']),
                    new Length([
                        'min' => 2,
                        'max' => 255,
                        'minMessage' => 'Le nom de famille doit comporter au moins {{ limit }} caractères.',
                        'maxMessage' => 'Le nom de famille ne peut pas dépasser {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('email', null, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Entrez votre email',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'L\'email ne peut pas être vide.']),
                    new Email(['message' => 'L\'email n\'est pas valide.']),
                ],
            ])
            ->add('picture', null, [
                'label' => 'Photo',
                'attr' => [
                    'placeholder' => 'Entrez l\'URL de votre photo',
                ],
            ])
            ->add('hash', null, [
                'label' => 'Mot de passe',
                'attr' => [
                    'placeholder' => 'Entrez votre mot de passe',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Le mot de passe ne peut pas être vide.']),
                ],
            ])
            ->add('avatar', null, [
                'label' => 'Avatar',
                'attr' => [
                    'placeholder' => 'Entrez l\'URL de votre avatar',
                ],
            ])
            ->add('presentation', null, [
                'label' => 'Présentation',
                'attr' => [
                    'placeholder' => 'Entrez votre présentation',
                ],
            ])
            ->add('slug', null, [
                'label' => 'Slug',
                'attr' => [
                    'placeholder' => 'Entrez le slug',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
