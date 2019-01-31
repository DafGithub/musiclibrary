<?php

namespace App\Form;

use App\Entity\Song;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SongSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('name')
//            ->add('lenght')
            ->add('styles')
//            ->add('artists')
//            ->add('submit', SubmitType::class, [
//                'label'=>'rechercher'
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Song::class,
//            'method'=>'get',
//            'csrf'=>'false',
        ]);
    }
}
