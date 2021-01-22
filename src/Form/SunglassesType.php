<?php

namespace App\Form;

use App\Entity\Sunglasses;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SunglassesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('image')
            ->add('description')
            ->add('icone')
            ->add('categorie')
            ->add('souscategorie')
            ->add('soustitre')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sunglasses::class,
        ]);
    }
}
