<?php

namespace App\Form;

use App\Entity\Service;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Rééducation et Thérapie' => 'Rééducation et Thérapie ',
                    'Activités de Loisirs et de Bien-être' => 'Activités de Loisirs et de Bien-être',
                    'Services de Soutien et d\'Assistance' => 'Services de Soutien et d\'Assistance',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
        ]);
    }
}
