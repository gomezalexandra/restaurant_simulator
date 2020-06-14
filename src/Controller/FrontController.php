<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

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
    public function login()
    {
        return $this->render('login.html.twig');
    }

    /**
     * @Route("/register", name="app_register")
     */
    public function register()
    {
        return $this->render('register.html.twig');
    }

    /**
     * @Route("/{route}", name="app_dashboard")
     */
    public function logged($route, SessionInterface $session)
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
}
