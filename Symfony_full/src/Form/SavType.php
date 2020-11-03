<?php

namespace App\Form;

use App\Entity\Sav;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SavType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sav_nom')
            ->add('sav_prenom')
            ->add('sav_adr1')
            ->add('sav_adr2')
            ->add('sav_codepos')
            ->add('sav_ville')
            ->add('sav_probleme')
            ->add('dt_crea')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sav::class,
        ]);
    }
}
