<?php


namespace App\Form;

use App\Entity\Simulation;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SimulationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_need', IntegerType::class, [
                'help' => 'besoin de demarrage',
                'required' => false,
                ])
            ->add('first_income')
            ->add('fixed_charges')
            ->add('variable_expenses')
            ->add('income')
            ->add('user_id')
            ->add('income')
            //, EntityType::class, ['class' => Simulation::class,])
            ->add('created_at',  DateTimeType::class, [
               'widget' => 'single_text',
                'required' => false,
                ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Simulation::class
        ]);
    }
}