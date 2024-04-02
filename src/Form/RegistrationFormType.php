<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
            ->add('first_name', null, [
                'label' => false,
                'attr' => ['placeholder' => 'First name', 'class' => 'email']
            ])
            ->add('last_name', null, [
                'label' => false,
                'attr' => ['placeholder' => 'Last name', 'class' => 'email']
            ])
            ->add('email', null, [
                'label' => false,
                'attr' => ['placeholder' => 'Email', 'class' => 'email']
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => false,
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password', 'class' => 'password', 'placeholder' => 'Wachtwoord'],
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
            ])
            ->add('roles', ChoiceType::class, [ 
                'mapped' => false,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Admin' => 'ROLE_ADMIN',
                    'Data Acquisition' => 'ROLE_DATA_ACQUISITION',
                    'ICT Services' => 'ROLE_ICT_SERVICES',
                    'Development & Maintanance' => 'ROLE_DEVELOPMENT_MAINTENANCE',
                    'Service Management' => 'ROLE_SERVICE_MANAGEMENT',
                    'Stafbureau' => 'ROLE_STAFBUREAU',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
