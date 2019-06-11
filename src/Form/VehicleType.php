<?php 
// src/Form/ArticleType.php
namespace App\Form;

use App\Entity\Vehicle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('model', TextType::class)
            ->add('color', TextType::class)
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Voiture' => 'voiture',
                    'Camion' => 'camion',
                ]])
            ->add('capacity', TextType::class, [
    'help' => "veuillez saisir le nb de place de vehicule",
])
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}