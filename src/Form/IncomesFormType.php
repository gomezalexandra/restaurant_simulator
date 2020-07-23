<?php


namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use App\Entity\Incomes;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IncomesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('simulation_id', IntegerType::class)
            ->add('ca', IntegerType::class)
            ->add('first_needs', IntegerType::class)
            ->add('bank_incomes', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Incomes::class
        ]);
    }
}