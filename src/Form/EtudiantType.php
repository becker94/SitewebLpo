<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
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
            ->add('classe')
            ->add('formation')
            ->add('stages')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
