<?php
namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    //attributes
    #[Route('/', name: 'homepage')]
    public function homepage(StarshipRepository $repository): Response
    {
        $starship      = $repository->findAll();
        $starshipCount = count($starship);

        // an Associative array
        $myShips = $starship[array_rand($starship)];
        // return new Response('<h1>Welcome to the homepage</h1>');
        // dd($myShips);

        return $this->render('main/homepage.html.twig', ['numberOfStarShips' => $starshipCount, 'myShips' => $myShips, 'starShips' => $starship]);
    }
}
