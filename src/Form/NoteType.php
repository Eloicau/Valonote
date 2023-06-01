<?php

namespace App\Form;

use App\Entity\Note;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('text')
            ->add('user', EntityType::class, [
                'class' => 'App\Entity\User',
                'choice_label' => 'name',
            ])
            ->add('agent', EntityType::class, [
                'class' => 'App\Entity\Agent',
                'choice_label' => 'name',
            ])
            ->add('map', EntityType::class, [
                'class' => 'App\Entity\Map',
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Note::class,
        ]);
    }
}
