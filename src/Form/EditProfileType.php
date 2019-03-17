<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('username', TextType::Class, ['label'=>'Username'])
            ->add('firstname', TextType::Class, ['label'=>'Firstname'])
            ->add('lastname', TextType::Class, ['label'=>'Lastname'])
            ->add('email', EmailType::Class, ['label'=>'Email'])
//            ->add('submit', SubmitType::class, [
//                'label'=> 'Submit',
//                'attr'=>['class'=>'btn btn-md btn-black-outline display-4 btnr']
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => \App\Entity\User::class
        ]);
    }
}
