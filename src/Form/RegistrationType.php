<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;  

class RegistrationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        // ->add('nom', TextType::class, array(
        //     'required' => true,
        // ))
        ->add('prenom', TextType::class, array(
            'required' => true,
        ))
        ->add('adresse', TextType::class, array(
            'required' =>false,
        ))
        ->add('codePostal', TextType::class, array(
            'required' =>false,
        ))
        ->add('ville', TextType::class, array(
            'required' =>false,
        ))
        ;
        /*->add('roles', HiddenType::class, array(
            'label' => 'Rôles'
        ));*/

        // ->add('roles', ChoiceType::class, array(
        //     'label' => 'Rôles',
        //     'choices'  => array(
        //         'admin' => 'ROLE_ADMIN',
        //         'acheteur' => 'ROLE_ACHETEUR',
        //     ), 
        //     'required' => true, 
        //     'multiple' => true,          
        // ));
        
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }


    public function getBlockPrefix()
    {
        return 'app_registration';
    }
}
