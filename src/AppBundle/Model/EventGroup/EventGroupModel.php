<?php

namespace AppBundle\Model\EventGroup;

use AppBundle\Entity\EventGroup;
use AppBundle\Repository\EventGroupRepository;

class EventGroupModel
{
    /**
     * @var EventGroupRepository
     */
    protected $eventGroupRepository;

    public function __construct(EventGroupRepository $eventGroupRepository)
    {
        $this->eventGroupRepository = $eventGroupRepository;
    }

    /**
     * @return EventGroup[]
     */
    public function getAll()
    {
        return $this->eventGroupRepository->findAll();
    }

    /**
     * @param int $id
     * @param string $groupName
     * @return EventGroup
     * @throws \Exception
     */
    public function findOrCreate($id, $groupName)
    {
        $eventGroup = $this->eventGroupRepository->findOneBy(array('id' => $id));
        if (!$eventGroup && !empty($groupName)) {
            $eventGroup = new EventGroup();
            $eventGroup->setName($groupName);
        }

        if (!$eventGroup instanceof EventGroup) {
            throw new \Exception('Event not found');
        }

        return $eventGroup;
    }
}