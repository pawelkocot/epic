<?php

namespace AppBundle\Model\Event;

use AppBundle\Entity\Event;
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

    public function create($name, $group)
    {
        $event = new Event();
        $event->setName($name);
        $event->setGroup($group);

        $this->eventRepository->saveEntity($event);

        return $event;
    }
}