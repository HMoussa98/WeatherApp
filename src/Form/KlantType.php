<?php
// src/Form/KlantType.php

namespace App\Form;

use App\Entity\Klant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class KlantType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
{
$builder
->add('klantId', TextType::class)
    ->add('naam',)
    ->add('email',)
    ->add('telefoonnummer')
    ->add('contractDetails', TextType::class)
    ->add('type', ChoiceType::class, [
        'label' => 'Type',
        'choices' => [
            'Type 1' => 'type1',
            'Type 2' => 'type2',
            // Voeg hier andere opties toe indien nodig
        ],
        'attr' => ['class' => 'form-control'],
    ])
->add('startdatum', DateType::class, [
'widget' => 'single_text',
'html5' => false,
])
->add('einddatum', DateType::class, [
'widget' => 'single_text',
'html5' => false,
])
->add('status', TextType::class);
}

public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults([
'data_class' => Klant::class,
]);
}
}
