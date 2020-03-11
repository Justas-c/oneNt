<?php

namespace App\Form;

use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
// for file uploading:
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

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
            ->add('nuotraukos', FileType::class, [
                'label' => 'upload images:' //,
                //'multiple' => true
            ])
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
