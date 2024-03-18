<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'label' => false,
                'attr' => [
                    'autocomplete' => 'email',
                    'placeholder' => 'Email',
                     'class' => 'email'
                ],
            ])
            ->add('username', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'email',
                    'placeholder' => 'Username'

                ],
            ])
            ->add('firstName', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'email',
                    'placeholder' => 'First Name'
                ],
            ])
            ->add('lastName', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'email',
                    'placeholder' => 'Last Name'
                ],
            ])
            ->add('contractType', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'email',
                    'placeholder' => 'Contract Type'
                ],
            ])
            ->add('subscriptionStatus', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'email',
                    'placeholder' => 'Subscription Status'
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => false,
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'email',
                    'placeholder' => 'Password'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
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