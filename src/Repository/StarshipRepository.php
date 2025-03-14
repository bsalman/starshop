<?php
namespace App\Repository;

use App\Model\Starship;
use Psr\Log\LoggerInterface;

class StarshipRepository
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function findAll(): array
    {
        $this->logger->info("hallo this is a log message");

        return [
            new Starship(
                1,
                'USS LeafyCruiser (NCC-0001)',
                'Garden',
                'Picard',
                'under construction'),

            new Starship(
                2,
                'USS Espresso (NCC-0002)',
                'Gorge',
                'Picard',
                'under construction'),
            new Starship(
                3,
                'USS LatteMacchiato (NCC-0003)',
                'Michel',
                'Picard',
                'under construction'),

        ];

    }

    public function find(int $id): ?Starship
    {
        $starships = $this->findAll();
        foreach ($starships as $starship) {
            if ($starship->getId() === $id) {
                return $starship;
            }
        }
        return null;
    }
}
