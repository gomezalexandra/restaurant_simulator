<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\DAO\UserDAO;

class FrontController extends AbstractController
{
    protected $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

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
     * @Route("/{route}")
     */
    public function logged($route)
    {
        if ($route === 'dashboard') {
            $users = $this->userDAO->getUsers();
            if ($users) {
                dump($users);
                return $this->render('dashboard.html.twig', ['users'=>$users]);
            }
            else {
                return $this->render('homepage.html.twig');
            }
        }
        else {
            return $this->render('homepage.html.twig');
        }

    }
}
