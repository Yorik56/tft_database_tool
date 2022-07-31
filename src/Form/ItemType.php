<?php

namespace App\Form;

use App\Entity\Item;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'disabled' => true,
            ])
            ->add('image',TextType::class,[
                'disabled' => true,
            ])
            ->add('build', EntityType::class, [
                'class' => Item::class,
                'choice_label' => 'name',
                'placeholder' => 'Choisissez un nom dans la liste',
                'autocomplete' => true,
                'multiple' => true,
                'required'          => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Item::class,
        ]);
    }
}
