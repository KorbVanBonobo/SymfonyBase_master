<?php

namespace App\Form;

use App\Entity\Oeuvre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class OeuvreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null, array( // null prend par defaut le type d'input
                'attr' => array(
                    'class' => 'col-2'
                )
            ))
            // ->add('categorie', null, array( // null prend par defaut le type d'input
            //     'attr' => array(
            //         'class' => 'col-2'
            //     )
            // ))
            ->add('largeur', null, array( // null prend par defaut le type d'input
                'attr' => array(
                    'id' => 'xsize_choice',
                    'class' => 'col-2'
                )
            ))
            ->add('hauteur', null, array( // null prend par defaut le type d'input
                'attr' => array(
                    'id' => 'ysize_choice',
                    'class' => 'col-2'
                )
            ))


            // ->add('status')

            ->add('tableau', HiddenType::class)

            ->add('compteur', HiddenType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Oeuvre::class,
            'attr' => ['id' => 'oeuvre-form'],
        ]);

    }
}
