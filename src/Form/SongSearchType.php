<?php

namespace App\Form;

use App\Entity\MusicStyle;
use App\Entity\SongSearch;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SongSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('styles',EntityType::class, [
                'required'=>false,
                'label'=>false,
                'class' => MusicStyle::class,
                'multiple' => true,
            ])

            ->add('titles', null, [
                'required'=>false,
                'label'=>false,
                'attr'=>[
                    'placeholder'=>'Mot-clé...'
                ]
            ])
            ;



    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SongSearch::class
        ]);
    }
}
