<?php

namespace App\Form;

use App\Entity\Champion;
use App\Entity\ChampionItem;
use App\Entity\Item;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChampionItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rank')
            ->add('champion', EntityType::class, [
                'class' => Champion::class,
                'choice_label' => 'name',
                'placeholder' => 'Choisissez un nom dans la liste',
                'autocomplete' => true,
            ])
            ->add('items', EntityType::class, [
                'class' => Item::class,
                'choice_label' => 'name',
                'placeholder' => 'Choisissez un nom dans la liste',
                'autocomplete' => true,
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ChampionItem::class,
        ]);
    }
}
