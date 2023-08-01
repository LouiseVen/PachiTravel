<?php

// src/Form/PetType.php

namespace App\Form;

use App\Entity\Pet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('name', TextType::class, [
                'label' => 'Name',
            ])
            ->add('height', IntegerType::class, [
                'label' => 'Height (in cm)',
            ])
            ->add('weight', IntegerType::class, [
                'label' => 'Weight (in kg)',
            ])
            ->add('categorised', CheckboxType::class, [
                'label' => 'Categorised',
                'required' => false,
            ])
            ->add('picture', FileType::class, [
                'label' => 'Picture',
                'required' => false,
                'data_class' => null,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pet::class,
        ]);
    }
}
