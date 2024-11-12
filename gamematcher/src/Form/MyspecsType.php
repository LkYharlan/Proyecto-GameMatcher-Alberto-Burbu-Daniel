<?php

namespace App\Form;

use App\Entity\Cpulist;
use App\Entity\Gpulist;
use App\Entity\Myspecs;
use App\Entity\Ramlist;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MyspecsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user_id', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
            ])
            ->add('cpu_id', EntityType::class, [
                'class' => Cpulist::class,
'choice_label' => 'id',
            ])
            ->add('gpu_id', EntityType::class, [
                'class' => Gpulist::class,
'choice_label' => 'id',
            ])
            ->add('ram_id', EntityType::class, [
                'class' => Ramlist::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Myspecs::class,
        ]);
    }
}
