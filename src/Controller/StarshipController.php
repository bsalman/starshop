<?php
namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route as Router;

class StarshipController extends AbstractController
{
    #[Router('/starships/{id<\d+>}', name: 'app_starship_show')]
    public function showOne(int $id, StarshipRepository $repository): Response
    {

        $ship = $repository->find($id);
        if (! $ship) {
            throw $this->createNotFoundException('Starship not found');
        } else {
            return $this->render('ships/singleShip.html.twig', ['shipId' => $id, 'ship' => $ship]);

        }

    }
}
