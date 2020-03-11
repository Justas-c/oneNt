<?php

namespace App\Form;

use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AddPropertyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gatve')
            ->add('plotas')
            ->add('kambariuSkaicius')
            ->add('miestas')
            ->add('butonr')
            ->add('aukstas')
            ->add('irengimas')
            ->add('content')
            ->add('nuotraukos')
            ->add('save', SubmitType::class, ['label' => 'įkelti'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }
}
