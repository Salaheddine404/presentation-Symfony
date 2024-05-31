<?php

namespace App\Form;

use App\Entity\RndVs;
use App\Entity\Service;
use App\Entity\Utulisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RndVsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('datTime', DateTimeType::class, [
                'widget' => 'single_text',
            ])
            ->add('reminder')
            ->add('status')
            ->add('utulisateur', EntityType::class, [
                'class' => Utulisateur::class,
                'choice_label' => 'name',
            ])
            ->add('service', EntityType::class, [
                'class' => Service::class,
                'choice_label' => 'name',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RndVs::class,
        ]);
    }
}
