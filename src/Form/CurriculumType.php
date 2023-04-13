<?php

namespace App\Form;

use App\Entity\Curriculum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CurriculumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname')
            ->add('firstname')
            ->add('city')
            ->add('age')
            ->add('levelOfStudies')
            ->add('totalExperience')
            ->add('linkLinkedin')
            ->add('linkGithub')
            // ->add('save', SubmitType::class,['label' => 'Create CV'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Curriculum::class,
        ]);
    }
}
