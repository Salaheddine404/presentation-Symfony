<?php

// src/Form/DescriptionType.php

namespace App\Form;

use App\Entity\Description;
use App\Entity\Service;
use App\Entity\Utulisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DescriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('demande')
            ->add('status')
            ->add('utulisateur', EntityType::class, [
                'class' => Utulisateur::class,
                'choice_label' => 'id',
            ])
            ->add('service', EntityType::class, [
                'class' => Service::class,
                'choice_label' => 'name',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Description::class,
        ]);
    }
}
