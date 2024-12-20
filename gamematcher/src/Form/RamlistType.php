<?php

namespace App\Form;

use App\Entity\Myspecs;
use App\Entity\Ramlist;
use App\Entity\Videogames;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RamlistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('technology')
            ->add('memory')
            ->add('frequency')
            ->add('ramscore')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ramlist::class,
        ]);
    }
}
