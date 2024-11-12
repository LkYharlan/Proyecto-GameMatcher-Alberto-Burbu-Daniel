<?php

namespace App\Form;

use App\Entity\Cpulist;
use App\Entity\Myspecs;
use App\Entity\Videogames;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CpulistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('model')
            ->add('core')
            ->add('manufacturer')
            ->add('cpuscore')
            ->add('gpu_id', EntityType::class, [
                'class' => Myspecs::class,
'choice_label' => 'id',
            ])
            ->add('myspecs', EntityType::class, [
                'class' => Myspecs::class,
'choice_label' => 'id',
            ])
            ->add('videogames', EntityType::class, [
                'class' => Videogames::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cpulist::class,
        ]);
    }
}
