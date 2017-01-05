<?php

namespace AppBundle\Model\Event;

use AppBundle\Entity\Event;
use AppBundle\Entity\EventGroup;
use AppBundle\Repository\EventRepository;

class CreateEventModel
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
     * @param string $name
     * @param EventGroup $eventGroup
     * @return Event
     */
    public function create($name, EventGroup $eventGroup)
    {
        $event = new Event();
        $event->setName($name);
        $event->setEventGroup($eventGroup);

        $this->eventRepository->saveEntity($event);

        return $event;
    }
}