<?php

namespace App\Form;
// src/Form/AbonnementType.php

use App\Entity\Abonnement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Klant;

class AbonnementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('abonnementType', TextType::class)
            ->add('geldigheid', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
            ])
            ->add('klant', EntityType::class, [
                'class' => Klant::class,
                'choice_label' => 'klantId',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Abonnement::class,
        ]);
    }
}
