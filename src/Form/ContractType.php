<?php

// src/Form/ContractType.php

namespace App\Form;

use App\Entity\Contract;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Klant;

class ContractType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
{
$builder
->add('contractDetails', TextType::class)
->add('startdatum', DateType::class, [
'widget' => 'single_text',
'html5' => false,
])
->add('einddatum', DateType::class, [
'widget' => 'single_text',
'html5' => false,
])
->add('status', TextType::class)
->add('klant', EntityType::class, [
'class' => Klant::class,
'choice_label' => 'klantId',
]);
}

public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults([
'data_class' => Contract::class,
]);
}
}
