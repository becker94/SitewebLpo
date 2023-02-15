<?php

namespace App\Form;

use App\Entity\AncienEtudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AncienEtudiantType extends AbstractType
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
            ->add('metierFormation')
            ->add('aneeEtude')
            ->add('formation')
            ->add('stages')
            ->add('entreprise')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AncienEtudiant::class,
        ]);
    }
}
