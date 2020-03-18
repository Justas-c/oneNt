<?php

namespace App\Form;

use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
// for file uploading:
use Symfony\Component\Form\Extension\Core\Type\FileType;
// for form types:
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AddPropertyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gatve')
            ->add('plotas')
            ->add('type', ChoiceType::Class, [
                'choices' => [
                    'butas' => 'butai',
                    'namas' => 'namai',
                    'sklypas' => 'sklypai'
                    ]
                ])
            ->add('kambariuSkaicius')
            ->add('miestas', ChoiceType::Class, [
                'choices' => [
                    'Vilnius' => 'Vilnius',
                    'Kaunas' => 'Kaunas',
                    'Taurage' => 'Taurage'
                ]
            ])
            ->add('butonr')
            ->add('aukstas')
            ->add('apdaila', ChoiceType::Class,
            ['choices' => [
                'pilna' => 'pilna',
                'daline' => 'dalinė',
                'nera' => 'nera'
            ]

            ])
            ->add('kaina')
            ->add('content')
            ->add('nuotraukos', FileType::Class, [
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

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
