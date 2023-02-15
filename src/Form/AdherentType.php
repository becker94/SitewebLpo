<?php

namespace App\Form;

use App\Entity\Adherent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdherentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomAdherent')
            ->add('prenomAdherent')
            ->add('adresseMailAdherent')
            ->add('domaineAdherent')
            ->add('temoignage')
            ->add('referenceLinkedin')
            ->add('login')
            ->add('motDePasse')
            ->add('formation')
            ->add('stages')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adherent::class,
        ]);
    }
}
