<?php


namespace App\Form;

use App\Entity\Simulation;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SimulationFormType extends AbstractType
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_need', IntegerType::class, [
                'help' => 'besoin de demarrage',
                'required' => false,
                'invalid_message' => 'Symfony is too smart for your hacking!',
                ])
            ->add('first_income', IntegerType::class, [
                'required' => false,
                ])
            ->add('fixed_charges', IntegerType::class, [
                'required' => false,
            ])
            ->add('variable_expenses', IntegerType::class, [
                'required' => false,
            ])
            ->add('income', IntegerType::class, [
                'required' => false,
            ])
            ->add('user_id', IntegerType::class, [
                'required' => false,
            ])
           /* ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'name',
                'placeholder' => 'choose a name',
                'choices' => $this->userRepository->findAllNameAlphabetical(),
            ])*/
            //, EntityType::class, ['class' => Simulation::class,])
           ->add('created_at', DateTimeType::class, [
               'widget' => 'single_text',
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