<?php


namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;

class BackController extends Controller
{
    /**
     * @Route("/test",  name="app_test")
     */
    public function test()
    {
        return $this->render('pagetest.html.twig');
    }
}