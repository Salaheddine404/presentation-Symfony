<?php

namespace App\Form;

use App\Entity\Description;
use App\Entity\service;
use App\Entity\utulisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiscussionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('demande')
            ->add('status')
            ->add('utulisateur', EntityType::class, [
                'class' => utulisateur::class,
                'choice_label' => 'id',
            ])
            ->add('service', EntityType::class, [
                'class' => service::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Description::class,
        ]);
    }
}
