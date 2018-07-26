<?php

namespace App\Form;

use App\Entity\DetailCommandes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DetailCommandesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        // ->add('quantite', null, array(
        //     'label' => 'Quantite',
        //     'attr' => array(
        //         'class' => "",
        //     )
        // ))
        // ->add('prix', null, array(
        //     'label' => 'Prix',
        //     'attr' => array(
        //         'class' => "",
        //     )
        // ))
        // ->add('commande', null, array(
        //     'label' => 'Commande',
        //     'attr' => array(
        //         'class' => "",
        //     )
        // ))
        // ->add('oeuvres', null, array(
        //     'label' => 'oeuvres',
        //     'attr' => array(
        //         'class' => "",
        //     )
        // ))

            ->add('quantite')
            ->add('prix')
            ->add('commande')
            ->add('oeuvres')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DetailCommandes::class,
        ]);
    }
}
