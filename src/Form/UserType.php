<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array(
                'label' => 'Utilisateur',
                'attr' => array(
                    'class' => "",
                )
            ))
            ->add('email', null, array(
                'label' => 'Email',
                'attr' => array(
                    'class' => "",
                )
            ))
            ->add('enabled', null, array(
                'label' => 'Actif',
                'attr' => array(
                    'class' => "",
                )
            ))
            ->add('plainPassword', null, array(
                'label' => 'Mot de passe',
                'attr' => array(
                    'class' => "",
                )
            ))
            ->add('roles', ChoiceType::class, array(
                'label' => 'Role',
                'multiple' => true,
                'choices' => array(
                    'role.admin' => 'ROLE_ADMIN',
                    'role.user' => 'ROLE_USER',
                ),
                'attr' => array(
                    'class' => "",
                )
            ))
            ->add('nom', null, array(
                'label' => 'Nom',
                'attr' => array(
                    'class' => "",
                )
            ))
            ->add('prenom', null, array(
                'label' => 'Prenom',
                'attr' => array(
                    'class' => "",
                )
            ))
            ->add('adresse', null, array(
                'label' => 'Adresse',
                'attr' => array(
                    'class' => "",
                )
            ))
            ->add('codePostal', null, array(
                'label' => 'Code postal',
                'attr' => array(
                    'class' => "",
                )
            ))
            ->add('ville', null, array(
                'label' => 'Ville',
                'attr' => array(
                    'class' => "",
                )
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
