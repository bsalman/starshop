<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    //attributes
    #[Route('/', name: 'homepage')]
    public function homepage(): Response
    {
        // return new Response('<h1>Welcome to the homepage</h1>');

        return $this->render('main/homepage.html.twig');
    }
}
