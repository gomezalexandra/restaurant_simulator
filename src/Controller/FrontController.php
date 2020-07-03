<?php


namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\UserRegistrationFormType;
use App\Security\LoginFormAuthenticator;

class FrontController extends Controller
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('homepage.html.twig');
    }

    /**
     * @Route("/login", name="app_login")
     */
    public function login(Request $request, EntityManagerInterface $em)
    {
        return $this->render('login.html.twig');
    }

    /**
     * @Route("/testlogin", name="app_test_login")
     */
    public function testlogin(Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(UserRegistrationFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $form->getData();

            $em->persist($user);
            $em->flush();
        }

        return $this->render('login.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/register", name="app_register")
     */
    public function register()
    {
        return $this->render('register.html.twig');
    }

    /**
     * @Route("/concept", name="app_concept")
     */
    public function concept()
    {
        return $this->render('concept.html.twig');
    }

    /**
     * @Route("/contact", name="app_contact")
     */
    public function contact()
    {
        return $this->render('contact.html.twig');
    }

    /**
     * @Route("/dashboard", name="app_dashboard")
     */
    public function dashboard(SessionInterface $session)
    {
      /*$users = $this->userDAO->getUsers();
        if ($users) {
            dump($users);
            $session->set('id', $users[1]);
            $userLogged = $session->get('id');
            return $this->render('dashboard.html.twig', ['users'=>$users, 'userLogged'=>$userLogged]);
        }
        else {
            return $this->render('homepage.html.twig');
        }*/
        return $this->render('dashboard.html.twig');
    }

    /*
    /**
     * @Route("/{route}", name="app_dashboard")
     */

   /* public function logged($route, SessionInterface $session)
    {
        $users = $this->userDAO->getUsers();
        if ($route === 'dashboard') {
            if ($users) {
                dump($users);
                $session->set('id', $users[1]);
                $userLogged = $session->get('id');
                return $this->render('dashboard.html.twig', ['users'=>$users, 'userLogged'=>$userLogged]);
            }
            else {
                return $this->render('homepage.html.twig');
            }
        }
        elseif ($route === 'new_simulation'){
            if ($_POST){
                $userLogged = $session->get('id');
                $this->financialDataDAO->newSimulation($_POST, $session->get('id')->getId());
                return $this->render('dashboard.html.twig', ['users'=>$users, 'userLogged'=>$userLogged]);
            }
            else {
                return $this->render('new_simulation.html.twig');
            }
        }
        elseif ($route === 'simulation_draft'){
            return $this->render('simulation_draft.html.twig');
        }
        elseif ($route === 'simulation_saved'){
            return $this->render('simulation_saved.html.twig');
        }
        else {
            return $this->render('homepage.html.twig');
        }

    }
    */

   }
