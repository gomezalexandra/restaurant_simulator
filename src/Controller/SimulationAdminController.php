<?php


namespace App\Controller;


use App\Entity\Simulation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SimulationAdminController extends AbstractController
{
    /**
     * @Route("/admin/simulation/new")
     */
    public function new(EntityManagerInterface $em)
    {

        $simulation = new Simulation();
        $simulation->setFirstIncome(100)
            ->setFirstNeed(50)
            ->setFixedCharges(10)
            ->setVariableExpenses(10)
            ->setIncome(150)
            ->setUserId(1)
            ->setCreatedAt(new \DateTime(sprintf('-%d days', rand(1, 100))));

        $em->persist($simulation);
        $em->flush();

        return new Response(sprintf(
            'Hiya! New Article id: %d',
            $simulation->getId()
        ));
    }
}