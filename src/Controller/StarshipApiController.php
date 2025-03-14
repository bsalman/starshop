<?php
namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getCollection(starshipRepository $repository): Response
    {
        // dd($repository);
        $starShips = $repository->findAll();
        return $this->json($starShips);
    }

    #[Route('/{id<\d+>}', methods: ['GET'])]
    public function getOne(int $id, StarshipRepository $repository): Response
    {
        $starShip = $repository->find($id);
        if (! $starShip) {
            throw $this->createNotFoundException('Starship not found');
        }
        return $this->json($starShip);
    }

}
