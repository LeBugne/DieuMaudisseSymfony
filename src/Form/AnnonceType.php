<?php

namespace App\Form;

use App\Entity\Evaluations;
use App\Entity\ListeAttente;
use App\Entity\Litige;
use App\Entity\Prestations;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('descr_prestation')
            ->add('cout_prestation')
            ->add('date_debut')
            ->add('litige', EntityType::class, [
                'class' => Litige::class,
'choice_label' => 'id',
            ])
            ->add('liste_attente', EntityType::class, [
                'class' => ListeAttente::class,
'choice_label' => 'id',
            ])
            ->add('evaluation', EntityType::class, [
                'class' => Evaluations::class,
'choice_label' => 'id',
            ])
            ->add('fournisseur', EntityType::class, [
                'class' => Utilisateur::class,
'choice_label' => 'id',
            ])
            ->add('client', EntityType::class, [
                'class' => Utilisateur::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prestations::class,
        ]);
    }
}
