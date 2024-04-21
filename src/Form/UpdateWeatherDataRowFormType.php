<?php



namespace App\Form;

use App\Entity\Weatherdata;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateWeatherDataRowFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('TEMP', null, [
                'label' => 'Temperatuur (°C)',
                'attr' => ['placeholder' => 'Temperatuur', 'class' => 'form-control'],
            ])
            ->add('DEWP', null, [
                'label' => 'Dauwpunt temperatuur (°)',
                'attr' => ['placeholder' => 'Dauwpunt temperatuur', 'class' => 'form-control'],
            ])
            ->add('STP', null, [
                'label' => 'Station Luchtdruk',
                'attr' => ['placeholder' => 'Station Luchtdruk', 'class' => 'form-control'],
            ])
            ->add('SLP', null, [
                'label' => 'Zeeniveau Luchtdruk',
                'attr' => ['placeholder' => 'Zeeniveau Luchtdruk', 'class' => 'form-control'],
            ])
            ->add('VISIB', null, [
                'label' => 'Zicht',
                'attr' => ['placeholder' => 'Zicht', 'class' => 'form-control'],
            ])
            ->add('WDSP', null, [
                'label' => 'Windsnelheid',
                'attr' => ['placeholder' => 'Windsnelheid', 'class' => 'form-control'],
            ])
            ->add('PRCP', null, [
                'label' => 'Neerslag',
                'attr' => ['placeholder' => 'Neerslag', 'class' => 'form-control'],
            ])
            ->add('SNDP', null, [
                'label' => 'Sneeuwdiepte',
                'attr' => ['placeholder' => 'Sneeuwdiepte', 'class' => 'form-control'],
            ])
            ->add('FRSHTT', null, [
                'label' => 'FRSHTT',
                'attr' => ['placeholder' => 'FRSHTT', 'class' => 'form-control'],
            ])
            ->add('CLDC', null, [
                'label' => 'Bewolking (%)',
                'attr' => ['placeholder' => 'Bewolking (%)', 'class' => 'form-control'],
            ])
            ->add('WNDDIR', null, [
                'label' => 'Windrichting',
                'attr' => ['placeholder' => 'Windrichting', 'class' => 'form-control'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Weatherdata::class,
        ]);
    }
}
