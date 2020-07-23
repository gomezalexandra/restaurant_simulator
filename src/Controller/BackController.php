<?php


namespace App\Controller;


use App\Entity\Charges;
use App\Entity\Simulation;
use App\Entity\Simulationbis;
use App\Form\SimulationbisFormType;
use App\Form\SimulationFormType;
use App\Form\IncomesFormType;
use App\Form\ChargesFormType;
use App\Repository\SimulationRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class BackController extends Controller
{
    /**
     * @Route("/test",  name="app_test")
     */
    public function test()
    {
        return $this->render('pagetest.html.twig');
    }

    /**
     * @Route("/new_simulation_bis", name="app_new_simulation_bis")
     */
    public function newsimulationbis(EntityManagerInterface $em, Request $request)
    {
            $form = $this->createForm(SimulationbisFormType::class);
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
                /** @var Simulationbis $simulationbis */
                $simulationbis = $form->getData();
                $session = $request->getSession();
                $session->set('simulationbis', $simulationbis);

              //  $this->addFlash();
                return $this->redirectToRoute('app_incomes');
            }

            return $this->render('newsimulationbis.html.twig', [
                'simulationbisForm'=>$form->createView(),
            ]);

        /*$form = $this->createForm(SimulationbisFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // @var Simulationbis $simulationbis TODO mettre annotation etoile
            $simulationbis = $form->getData();

            $em->persist($simulationbis);
            $em->flush();

            return $this->redirectToRoute('app_incomes');
        }
        return $this->render('newsimulationbis.html.twig', [
            'simulationbisForm'=>$form->createView(),
            ]);*/
    }

    /**
     * @Route("/incomes", name="app_incomes")
     */
    public function incomes(EntityManagerInterface $em, Request $request)
    {
        if($request->getSession()->get('simulationbis')) {
            $form = $this->createForm(IncomesFormType::class);
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
                /** @var Incomes $incomes */
                $incomes = $form->getData();
                $session = $request->getSession();
                $session->set('incomes', $incomes);

               // $this->addFlash();
                return $this->redirectToRoute('app_charges');
            }
                return $this->render('incomes.html.twig', [
                    'incomesForm'=>$form->createView(),
                ]);
        }
        return $this->redirectToRoute('app_new_simulation_bis');

       /* $form = $this->createForm(IncomesFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // @var Incomes $incomes TODO mettre annotation etoile
            $incomes = $form->getData();


            $em->persist($incomes);
            $em->flush();

            return $this->redirectToRoute('app_charges');
            //return $this->incomesVerification($em, $request, $incomes);
        }
        return $this->render('incomes.html.twig', [
            'incomesForm'=>$form->createView(),
        ]);*/
    }

    /**
     * @Route("/charges", name="app_charges")
     */
    public function charges(EntityManagerInterface $em, Request $request)
    {
        if($request->getSession()->get('incomes')) {
            $form = $this->createForm(ChargesFormType::class);
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
                /** @var Charges $charges */
                $charges = $form->getData();
                $session = $request->getSession();
                $session->set('charges', $charges);

                // $this->addFlash();
                return $this->redirectToRoute('app_all_verification');
            }
            return $this->render('charges.html.twig', [
                'chargesForm'=>$form->createView(),
            ]);
        }
        return $this->redirectToRoute('app_new_simulation_bis');

        /*$form = $this->createForm(ChargesFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // @var Charges $charges
            $charges = $form->getData();

            $em->persist($charges);
            $em->flush();

            return $this->redirectToRoute('app_dashboard');
        }
        return $this->render('charges.html.twig', [
            'chargesForm'=>$form->createView(),
        ]);*/
    }

    /**
     * @Route("/all_verification", name="app_all_verification")
     */
    public function allVerification(Request $request)
    {
        if($request->getSession()->get('charges')) {

            return $this->render('all_verification.html.twig');
        }
        return $this->redirectToRoute('app_new_simulation_bis');
    }

    /**
     * @Route("/flush", name="app_flush")
     */
    public function flush(EntityManagerInterface $em, Request $request)
    {
        if($request->getSession()->get('charges')) {

            $simulationbis = $request->getSession()->get('simulationbis');
            $incomes = $request->getSession()->get('incomes');
            $charges = $request->getSession()->get('charges');

            $em->persist($simulationbis);
            $em->persist($incomes);
            $em->persist($charges);

            $em->flush();

            $request->getSession()->remove('simulationbis');
            $request->getSession()->remove('incomes');
            $request->getSession()->remove('charges');

            return $this->render('flush.html.twig');
        }

        return $this->redirectToRoute('app_new_simulation_bis');
    }



    /**
     * @Route("/newsimulation", name="app_new_simulation")
     */
    public function newSimulation(EntityManagerInterface $em, Request $request)
    {
        $form = $this->createForm(SimulationFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Simulation $simulation */
            $simulation = $form->getData();

            /*$simulation = new Simulation();
            $simulation->setFirstNeed($data['first_need']);
            $simulation->setFirstIncome($data['first_income']);
            $simulation->setFixedCharges($data['fixed_charges']);
            $simulation->setVariableExpenses($data['variable_expenses']);
            $simulation->setIncome($data['income']);
            $simulation->setUserId($data['user_id']);
            //$simulation->setCreatedAt($data['created_at']);*/
            //$simulation->setCreatedAt(new \DateTime('now'));

            $em->persist($simulation);
            $em->flush();

            $this->addFlash('success', 'Simulation bien créée!');

            return $this->redirectToRoute('app_dashboard');
        }


            return $this->render('new_simulation.html.twig', [
                'simulationForm' => $form->createView(),
            ]);

    }

    /**
     * @Route("/list", name="admin_simulation_list")
     */
    public function list(SimulationRepository $simulationRepository)
    {
        $simulation = $simulationRepository->findAll();

        return $this->render('list.html.twig', [
            'simulations' => $simulation
        ]);
    }

    /**
     * @Route("/simulationdraft", name="app_simulation_draft")
     */
    public function simulationDraft( EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Simulation::class);
        /**@var Simulation $simulations */
        $simulations = $repository->findBy([], ['id' => 'DESC']);

        if (!$simulations) {
            throw $this->createNotFoundException(sprintf('No simulation '));
        }

        dump($repository);
        return $this->render('simulation_draft.html.twig', [
            'simulations' => $simulations
        ]);
    }

    /**
     * @Route("/news/{slug}", name="article_show")
     */
    public function show($slug, EntityManagerInterface $em)
    {
    $repository =$em->getRepository(Simulation::class);
    /** @var Simulation $simulations */
    $simulations = $repository->findAll();
        $comments = '
            I ate a normal rock once. It did NOT taste like bacon!
            Woohoo! I\'m going on an all-asteroid diet!
            I like bacon too! Buy some from my site! bakinsomebacon.com';

        $articleContent = '
Spicy **jalapeno bacon** ipsum dolor amet veniam shank in dolore. Ham hock nisi landjaeger cow.';


        return $this->render('pagetest.html.twig', [
            'simulations' => $simulations,
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'slug' => $slug,
            'comments' => $comments,
            'articleContent' => $articleContent,
        ]);
    }

    /**
     * @Route("/simulationsaved/{id}", name="app_simulation_saved)
     */
    /*public function simulationSaved(EntityManagerInterface $em, Simulation $simulation, Request $request)
    {
        $form = $this->createForm(SimulationFormType::class, $simulation);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($simulation);
            $em->flush();

            $this->addFlash('success', 'Article Updated! Inaccuracies squashed!');
            return $this->redirectToRoute('app_dashboard', [
                'id' => $simulation->getId(),
            ]);
        }

        return $this->render('simulation_saved.html.twig', [
            'simulationForm' => $form->createView()
        ]);
    }*/

    /**
     * @Route("/profile", name="app_profile")
     */
    public function profile()
    {
        return $this->render('profile.html.twig');
    }
}