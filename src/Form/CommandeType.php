<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('montant')
            ->add('date_enregistrement')
            ->add('etat')
            ->add('user', null, array(
                'label' => 'Client'
            ))

            // ->add('etat', null, array(
            //     'label' => 'etat',
            //     'choice_label' => 'etat',
            //     // 'required' => true,    // oblige a selectionner une valeur => enleve le 'None' !
            //     'expanded' => true,    //afiche avec des bouton radios
            //     'query_builder' => function(EntityRepository $er){
            //         return $er->createQueryBuilder('c')
            //             ->orderBy('c.etat', 'ASC');
            //     },
            // ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
