<?php

namespace App\Form;

use App\Entity\Comments;
use App\Entity\User;
use App\Entity\Videogames;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('text')
            ->add('user_id', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
            ])
            ->add('videogame_id', EntityType::class, [
                'class' => Videogames::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comments::class,
        ]);
    }
}
