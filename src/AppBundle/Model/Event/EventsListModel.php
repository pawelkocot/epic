<?php

namespace AppBundle\Model\Event;

use AppBundle\Entity\Event;
use AppBundle\Repository\EventRepository;

class EventsListModel
{
    /**
     * @var EventRepository
     */
    private $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * @return Event[]
     */
    public function getAllEvents()
    {
        $query = $this->eventRepository->getManager()
            ->createQueryBuilder()
            ->select('e, r, eg, att')
            ->from(Event::class, 'e')
            ->leftJoin('e.reservations', 'r')
            ->leftJoin('e.eventGroup', 'eg')
            ->leftJoin('e.attachments', 'att')
            ->orderBy('e.id', 'DESC')
            ->orderBy('r.id', 'DESC')
            ->getQuery();

        return $query->getResult();
    }
}