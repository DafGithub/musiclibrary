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

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('firstname', TextType::Class, ['label'=>false, 'attr'=>['placeholder'=>'Firstname']])
            ->add('lastname', TextType::Class, ['label'=>false, 'attr'=>['placeholder'=>'Lastname']])
            ->add('username', TextType::Class, ['label'=>false, 'attr'=>['placeholder'=>'Username']])
            ->add('email', EmailType::Class, ['label'=>false, 'attr'=>['placeholder'=>'Email']])
            ->add('password', RepeatedType::class, array(
                'type'=>PasswordType::class,
                'first_options'=> array('label'=>false,'attr'=>['placeholder'=>'Password']),
                'second_options'=> array('label'=>false,'attr'=>['placeholder'=>'Confirm password']),
            ))
            ->add('submit', SubmitType::class, [
                'label'=> 'Submit',
                'attr'=>['class'=>'btn btn-md btn-black-outline display-4 btnr']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => \App\Model\User::class
        ]);
    }
}
