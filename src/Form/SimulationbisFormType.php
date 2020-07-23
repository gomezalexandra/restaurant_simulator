<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use App\Entity\Simulationbis;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SimulationbisFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user_id', IntegerType::class)
            ->add('name', TextType::class)
            ->add('years', IntegerType::class)
            ->add('status', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Simulationbis::class
        ]);
    }
}
