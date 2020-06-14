<?php


namespace App\Controller;


use App\DAO\UserDAO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\DAO\FinancialDataDAO;


class Controller extends AbstractController
{
    protected $userDAO;
    protected $financialDataDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();

        $this->financialDataDAO = new FinancialDataDAO();
    }
}