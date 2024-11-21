<?php

namespace App\Form;

use App\Entity\Cpulist;
use App\Entity\Gpulist;
use App\Entity\Ramlist;
use App\Entity\Review;
use App\Entity\Videogames;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideogamesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('platform')
            ->add('name')
            ->add('ramrequirement', EntityType::class, [
                'class' => Ramlist::class,
'choice_label' => 'id',
            ])
            ->add('cpurequirement', EntityType::class, [
                'class' => Cpulist::class,
'choice_label' => 'id',
            ])
            ->add('gpurequirement', EntityType::class, [
                'class' => Gpulist::class,
'choice_label' => 'id',
            ])
            ->add('review', EntityType::class, [
                'class' => Review::class,
'choice_label' => 'id',
            ])
            ->add('picture')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Videogames::class,
        ]);
    }
}
