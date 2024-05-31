<?php



namespace App\Form;

use App\Entity\Message;
use App\Entity\utulisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content')
            ->add('sentAt', null, [
                'widget' => 'single_text',
            ])
            ->add('sender', EntityType::class, [
                'class' => utulisateur::class,
                'choice_label' => 'name',
            ])
            ->add('reciever', EntityType::class, [
                'class' => utulisateur::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}

