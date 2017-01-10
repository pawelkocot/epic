<?php

namespace AppBundle\Services\Csv;

use AppBundle\Services\EntityReducer\EntityReducer;

class ExportReservationsToCsv
{
    /**
     * @var EntityReducer
     */
    private $entityReducer;

    public function __construct(EntityReducer $entityReducer)
    {
        $this->entityReducer = $entityReducer;
    }

    public function export(array $reservations)
    {
        $reservations = $this->entityReducer->reduceEntity($reservations);
        if (count($reservations) == 0) {
            throw new \Exception('Empty reservations array');
        }

        ob_start();
        $output = fopen("php://output", 'w');
        fputcsv($output, array_keys($reservations[0]));
        foreach ($reservations as $reservation) {
            fputcsv($output, $reservation);
        }
        fclose($output);

        return ob_get_clean();
    }
}