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
        return $this->eventRepository->findAll();
    }
}