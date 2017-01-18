<?php
namespace AppBundle\Model\Reservations;

use AppBundle\Entity\Reservation;
use AppBundle\Repository\ReservationRepository;

class ReservationsListModel
{
    /**
     * @var ReservationRepository
     */
    private $reservationRepository;

    public function __construct(ReservationRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    /**
     * @param int $eventId
     * @return Reservation[]
     */
    public function getForEvent($eventId)
    {
        return $this->reservationRepository->findBy(
            ['event' => $eventId],
            ['id' => 'desc']
        );
    }
}
