<?php


namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use App\Entity\Charges;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChargesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('simulation_id', IntegerType::class)
            ->add('fixed_charge', IntegerType::class)
            ->add('variable_charge', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Charges::class
        ]);
    }
}